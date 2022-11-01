<?php

namespace App\Imports;

use App\Models\Simulation;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSimulation implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Simulation([
        'domaine'=>$row[0],
        'theme'=>$row[1],
        'superviseur'=>$row[2],
        'duree'=>$row[3],
        'participant'=>$row[4],
        'date'=>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5])->format('Y-m-d')

        ]);
    }
}
