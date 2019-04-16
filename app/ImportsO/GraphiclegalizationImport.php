<?php

namespace App\Imports;

use App\Graphiclegalization;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GraphiclegalizationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Graphiclegalization([
            'mes' =>  $row['Mes'], 
            'encargados_mes' =>  $row['Encargados por mes'], 
            'terminados_mes' =>  $row['Terminados por mes'], 
            'fuera_plazo' =>  $row['Fuera de plazo/ACUMULADO'], 
            'pasado_ejecucion' =>  $row['Pasado a ejecución'], 
            'administracion' =>  $row['Administración'], 
            'contrata' =>  $row['Contrata'], 
            'endesa' =>  $row['Endesa'], 
            'ingenieria' =>  $row['Ingeniería']
        ]);
    }
}
