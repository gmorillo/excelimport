<?php

namespace App\Imports;

use App\Replica;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReplicaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Replica([
            'tecnico_ede' => $row['Tecnico EDE'],
            'provincia' => $row['PROVINCIA'],
            'departamento' => $row['DEPARTAMENTO'],
            'tipo' => $row['TIPO'],
            'gom' => $row['GOM'],
            'solicitud' => $row['SOLICITUD'],
            'descripcion' => $row['DESCRIPCION'],
            'fecha_encargo' => $row['FECHA ENCARGO'],
            'ads_odm' => $row['AdS/odm'],
            'protocolo_atlante' => $row['Protocolo ATLANTE'],
            'fecha_diseno_atlante' => $row['Fecha diseñado ATLANTE'],
            'estado_atlante' => $row['Estado ATLANTE'],
            'fin_atlante' => $row['Fin Atlante'],
            'proyecto_agp' => $row['Proyecto AGP'],
            'estado_agp' => $row['Estado AGP'],
            'fin_agp' => $row['Fin AGP'],
            'finca' => $row['Finca'],
            'tiempo_replica' => $row['TIEMPO DE REPLICA '],
            'lca' => $row['LCA'],
            'fecha_concluso' => $row['FECHA CONCLUSO'],
            'ing_estudio' => $row['ING ESTUDIO'],
            'observaciones' => $row['OBSERVACIONES'],
            'plazos_atlante' => $row['PLAZOS ATLANTE'],
            'plazos_replica' => $row['PLAZOS REPLICA'],
            'tecnico_nipsa' => $row['TECNICO NIPSA'],
            'proyecto_nipsa' => $row['PROYECTO NIPSA'],
            'pendiente_endesa' => $row['PENDIENTE ENDESA'],
            'plazo' => $row['PLAZO'],
        ]);
    }
}
