<?php

namespace App\Imports;

use App\Cmreplicaglobal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CmreplicaglobalImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cmreplicaglobal([
            'mes' => $row['MES'],
            'encargados_mes' => $row['Encargados/MES'],
            'terminados_mes' => $row['Terminados/MES'],
            'fuera_plazo' => $row['Fuera de Plazo/ACUMULADO'],
            'pendiente_entrega' => $row['Pte. Entregar'],
        ]);
    }
}
