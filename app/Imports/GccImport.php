<?php

namespace App\Imports;

use App\Gcc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GccImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Gcc([
            preg_replace("[\n|\r|\n\r]", "",'mes') => preg_replace("[\n|\r|\n\r]", "",$row['MES']),
            preg_replace("[\n|\r|\n\r]", "",'encargados_mes') => preg_replace("[\n|\r|\n\r]", "",$row['Encargados/MES']),
            preg_replace("[\n|\r|\n\r]", "",'terminados_mes') => preg_replace("[\n|\r|\n\r]", "",$row['Terminados/MES']),
            preg_replace("[\n|\r|\n\r]", "",'pendiente_datos') => preg_replace("[\n|\r|\n\r]", "",$row['Pte. Datos']),
            preg_replace("[\n|\r|\n\r]", "",'pendiente_entrega') => preg_replace("[\n|\r|\n\r]", "",$row['Pte. Entregar']),
            preg_replace("[\n|\r|\n\r]", "",'fuera_plazo') => preg_replace("[\n|\r|\n\r]", "",$row['Fuera de Plazo/ACUMULADO']),
        ]);
    }
}