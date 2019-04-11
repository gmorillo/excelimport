<?php

namespace App\Imports;

use App\Cmetglobal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CmetglobalImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cmetglobal([
            'mes' => $row['MES'],
            'encargados_mes' => $row['Encargados/MES'],
            'terminados_mes' => $row['Terminados/MES'],
            'pendiente_datos' => $row['Pte. Datos'],
            'pendiente_entrega' => $row['Pte. Entregar'],
            'fuera_plazo' => $row['Fuera de Plazo/ACUMULADO'],
        ]);
    }
}
