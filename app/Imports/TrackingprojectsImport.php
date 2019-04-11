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
            'identificador_ede' =>  $row['SOLICITUD NNSS'], //SOLICITUD NNSS
            'trabajo_gom' =>  $row['TRABAJO GOM'], //TRABAJO GOM
            'identificador_ingenieria' =>  $row['CODIGO NIPSA'], //CODIGO NIPSA
            'lca' =>  $row['TAREA PROYECTO'], //TAREA PROYECTO
            'descripcion' =>  $row['TITULO ENCARGO O PROYECTO'], //TITULO ENCARGO O PROYECTO
            'topologia' =>  $row['TIPO TRABAJO'], //TIPO TRABAJO
            'tipo' =>  $row['TIPO'], //TIPO
            'municipio' =>  $row['POBLACIÓN'], //POBLACIÓN
            'fecha_pedido' =>  $row['FECHA ENCARGO'], //FECHA ENCARGO
            'fecha_entrega' =>  $row['FECHA ENTREGA'], //FECHA ENTREGA
            'plazo' =>  $row['Días Plazo'], //Días Plazo
            'provincia' =>  $row['PROVINCIA'], //PROVINCIA
        ]);
    }
}