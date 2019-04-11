<?php

namespace App\Imports;

use App\Graphicproject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GraphicprojectImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Graphicproject([
            'mes' =>  $row['Mes proyectos'], 
            'encargados_mes' =>  $row['Encargados por mes proyectos'], 
            'terminados_mes' =>  $row['Terminados por mes proyectos'], 
            'fuera_plazo' =>  $row['Fuera de plazo/ACUMULADO proyectos'], 
        ]);
    }
}
