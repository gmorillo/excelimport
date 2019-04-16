<?php

namespace App\Imports;

use App\Cmreplicaglobaldetallada;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CmreplicaglobaldetalladaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cmreplicaglobaldetallada([
            'mes' => $row['MES'],
            'encargados_mes' => $row['Encargados/MES'],
            'terminados_mes' => $row['Terminados/MES'],
            'fuera_plazo' => $row['FP'],
            'tipo' => $row['Tipo'],
        ]);
    }
}
