<?php

namespace App\Imports;

use App\Globalcalidadet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GlobalcalidadetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Globalcalidadet([
            'mes'               =>  $row['MES'],
            'encargados_mes'    =>  $row['Encargados/MES'],
            'terminados_mes'    =>  $row['Terminados/MES'],
            'pendiente_datos'   =>  $row['Pte. Datos'],
        ]);
    }
}
