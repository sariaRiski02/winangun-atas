<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ResidentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Resident([
            'name' => $row[0],
            'no_kk' => $row[1],
            'nik' => $row[2],
            'family_status' => $row[3],
            'marital_status' => $row[4],
            'job' => $row[5],
            'birth_date' => Date::excelToDateTimeObject($row[6])->format('Y-m-d'),
            'religion' => $row[7],
            'village' => $row[8],
            'gender' => $row[9],
        ]);
    }
}
