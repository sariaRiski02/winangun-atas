<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResidentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Resident([
            'name'           => strtolower($row['name']),
            'no_kk'          => preg_replace('/\D/', '', $row['no_kk']),
            'nik'            => preg_replace('/\D/', '', $row['nik']),
            'family_status'  => strtolower($row['family_status']),
            'marital_status' => strtolower($row['marital_status']),
            'job'            => strtolower($row['job']),
            'birth_date'     => is_numeric($row['birth_date'])
                ? Date::excelToDateTimeObject($row['birth_date'])->format('Y-m-d')
                : date('Y-m-d', strtotime($row['birth_date'])),
            'religion'       => strtolower($row['religion']),
            'village'        => strtolower($row['village']),
            'gender'         => $row['gender'],
            'education'      => strtolower($row['education']), // 
        ]);
    }
}
