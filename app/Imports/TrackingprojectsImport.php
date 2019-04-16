<?php

namespace App\Imports;

use App\Trackingproject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrackingprojectsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Trackingproject([
            preg_replace("[\n|\r|\n\r]", "",'identificador_ede') =>  preg_replace("[\n|\r|\n\r]", "",$row['SOLICITUD NNSS']), //SOLICITUD NNSS
            preg_replace("[\n|\r|\n\r]", "",'trabajo_gom') =>  preg_replace("[\n|\r|\n\r]", "",$row['TRABAJO GOM']), //TRABAJO GOM
            preg_replace("[\n|\r|\n\r]", "",'identificador_ingenieria') =>  preg_replace("[\n|\r|\n\r]", "",$row['CODIGO NIPSA']), //CODIGO NIPSA
            preg_replace("[\n|\r|\n\r]", "",'lca') =>  preg_replace("[\n|\r|\n\r]", "",$row['TAREA PROYECTO']), //TAREA PROYECTO
            preg_replace("[\n|\r|\n\r]", "",'descripcion') =>  preg_replace("[\n|\r|\n\r]", "",$row['TITULO ENCARGO O PROYECTO']), //TITULO ENCARGO O PROYECTO
            preg_replace("[\n|\r|\n\r]", "",'topologia') =>  preg_replace("[\n|\r|\n\r]", "",$row['TIPO TRABAJO']), //TIPO TRABAJO
            preg_replace("[\n|\r|\n\r]", "",'tipo') =>  preg_replace("[\n|\r|\n\r]", "",$row['TIPO']), //TIPO
            preg_replace("[\n|\r|\n\r]", "",'municipio') =>  preg_replace("[\n|\r|\n\r]", "",$row['POBLACIÓN']), //POBLACIÓN
            preg_replace("[\n|\r|\n\r]", "",'fecha_pedido') =>  preg_replace("[\n|\r|\n\r]", "",$row['FECHA ENCARGO']), //FECHA ENCARGO
            preg_replace("[\n|\r|\n\r]", "",'fecha_entrega') =>  preg_replace("[\n|\r|\n\r]", "",$row['FECHA ENTREGA']), //FECHA ENTREGA
            preg_replace("[\n|\r|\n\r]", "",'plazo') =>  preg_replace("[\n|\r|\n\r]", "",$row['Días Plazo']), //Días Plazo
            preg_replace("[\n|\r|\n\r]", "",'provincia') =>  preg_replace("[\n|\r|\n\r]", "",$row['PROVINCIA']), //PROVINCIA
        ]);
    }
}