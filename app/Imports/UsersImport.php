<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Convert CertificationDate to desired format
        $certificationDate = null;
        if (!empty($row['certificationdate'])) {
            $certificationDate = Date::excelToDateTimeObject($row['certificationdate'])->format('Y-m-d');
        }
    
        // Convert RecertificationDate to desired format
        $recertificationDate = null;
        if (!empty($row['recertificationdate'])) {
            $recertificationDate = Date::excelToDateTimeObject($row['recertificationdate'])->format('Y-m-d');
        }
    
        return new User([
            'name' => $row['firstname'] ?? null,
            'email' => $row['email'] ?? null,
            'password' => Hash::make($row['password']),
            'UserId' => $row['userid'] ?? null,
            'UnitNo' => $row['unitno'] ?? null,
            'FirstName' => $row['firstname'] ?? null,
            'LastName' => $row['lastname'] ?? null,
            'Age' => $row['age'] ?? null,
            'FamilySize' => $row['familysize'] ?? null,
            'CertificationDate' => $certificationDate,
            'RecertificationDate' => $recertificationDate,
            'ChangePwd' => $row['changepwd'] ?? false,
            'ContactDetails' => $row['contactdetails'] ?? false,
            'PhoneNumber' => $row['phonenumber'] ?? null,
            'Code' => $row['code'],
        ]);
    }
    
    protected function formatDate($date, $format)
    {
        try {
            if (!empty($date)) {
                // Try to create Carbon instance from 'Y-m-d' format
                $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
                // If it fails, try 'd-m-Y' format
                if (!$carbonDate) {
                    $carbonDate = Carbon::createFromFormat('d-m-Y', $date);
                }
                // If it fails, try 'm-d-y' format
                if (!$carbonDate) {
                    $carbonDate = Carbon::createFromFormat('m-d-y', $date);
                }
                // Format the date as required
                return $carbonDate ? $carbonDate->format($format) : null;
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
    
}