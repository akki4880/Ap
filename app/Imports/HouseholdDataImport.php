<?php

// app/Imports/HouseholdDataImport.php

namespace App\Imports;

use App\Models\HouseholdData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HouseholdDataImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new HouseholdData([
            'UnitNo' => $row['unitno'],
            'userId' => $row['userid'],
            'firstName' => $row['firstname'],
            'lastName' => $row['lastname'],
            'Age' => $row['age'],
            'AdultOrMinor' => $row['adultminor'], // Adjust the column name as needed
            'Relation' => $row['relation'],
            'Student' => $row['student'],
            'FamilySize' => $row['familysize'],
        //     'CertificationDate' => \Carbon\Carbon::createFromFormat('m/d/Y', $row['certificationdate']),
        // 'RecertificationDate' => \Carbon\Carbon::createFromFormat('m/d/Y', $row['recertificationdate']),
        'CertificationDate' => $this->parseDate($row['certificationdate']),
            'RecertificationDate' => $this->parseDate($row['recertificationdate']),
            'dob' => $this->parseDate($row['dob']),
            'Code' => $row['code'],
            'gender' => $row['gender'],
        ]);
    }
    private function parseDate($date)
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date));
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it) or return a default value
            return null;
        }
    }
}