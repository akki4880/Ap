<?php

// app/Imports/PropertiesImport.php

namespace App\Imports;

use App\Models\Properties;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertiesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Properties([
            'Code' => $row['code'],
            'Property' => $row['property'],
            'Address' => $row['address'],
            'City' => $row['city'],
            'Zip' => $row['zip'],
            'State' => $row['state'],
            'units' => $row['units'],
        ]);
    }
}