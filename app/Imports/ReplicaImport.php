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
            preg_replace("[\n|\r|\n\r]", "",'tecnico_ede') => preg_replace("[\n|\r|\n\r]", "",$row['Tecnico EDE']),
            preg_replace("[\n|\r|\n\r]", "",'provincia') => preg_replace("[\n|\r|\n\r]", "",$row['PROVINCIA']),
            preg_replace("[\n|\r|\n\r]", "",'departamento') => preg_replace("[\n|\r|\n\r]", "",$row['DEPARTAMENTO']),
            preg_replace("[\n|\r|\n\r]", "",'tipo') => preg_replace("[\n|\r|\n\r]", "",$row['TIPO']),
            preg_replace("[\n|\r|\n\r]", "",'gom') => preg_replace("[\n|\r|\n\r]", "",$row['GOM']),
            preg_replace("[\n|\r|\n\r]", "",'solicitud') => preg_replace("[\n|\r|\n\r]", "",$row['SOLICITUD']),
            preg_replace("[\n|\r|\n\r]", "",'descripcion') => preg_replace("[\n|\r|\n\r]", "",$row['DESCRIPCION']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_encargo') => preg_replace("[\n|\r|\n\r]", "",$row['FECHA ENCARGO']),
            preg_replace("[\n|\r|\n\r]", "",'ads_odm') => preg_replace("[\n|\r|\n\r]", "",$row['AdS/odm']),
            preg_replace("[\n|\r|\n\r]", "",'protocolo_atlante') => preg_replace("[\n|\r|\n\r]", "",$row['Protocolo ATLANTE']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_diseno_atlante') => preg_replace("[\n|\r|\n\r]", "",$row['Fecha diseñado ATLANTE']),
            preg_replace("[\n|\r|\n\r]", "",'estado_atlante') => preg_replace("[\n|\r|\n\r]", "",$row['Estado ATLANTE']),
            preg_replace("[\n|\r|\n\r]", "",'fin_atlante') => preg_replace("[\n|\r|\n\r]", "",$row['Fin Atlante']),
            preg_replace("[\n|\r|\n\r]", "",'proyecto_agp') => preg_replace("[\n|\r|\n\r]", "",$row['Proyecto AGP']),
            preg_replace("[\n|\r|\n\r]", "",'estado_agp') => preg_replace("[\n|\r|\n\r]", "",$row['Estado AGP']),
            preg_replace("[\n|\r|\n\r]", "",'fin_agp') => preg_replace("[\n|\r|\n\r]", "",$row['Fin AGP']),
            preg_replace("[\n|\r|\n\r]", "",'finca') => preg_replace("[\n|\r|\n\r]", "",$row['Finca']),
            preg_replace("[\n|\r|\n\r]", "",'tiempo_replica') => preg_replace("[\n|\r|\n\r]", "",$row['TIEMPO DE REPLICA ']),
            preg_replace("[\n|\r|\n\r]", "",'lca') => preg_replace("[\n|\r|\n\r]", "",$row['LCA']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_concluso') => preg_replace("[\n|\r|\n\r]", "",$row['FECHA CONCLUSO']),
            preg_replace("[\n|\r|\n\r]", "",'ing_estudio') => preg_replace("[\n|\r|\n\r]", "",$row['ING ESTUDIO']),
            preg_replace("[\n|\r|\n\r]", "",'observaciones') => preg_replace("[\n|\r|\n\r]", "",$row['OBSERVACIONES']),
            preg_replace("[\n|\r|\n\r]", "",'plazos_atlante') => preg_replace("[\n|\r|\n\r]", "",$row['PLAZOS ATLANTE']),
            preg_replace("[\n|\r|\n\r]", "",'plazos_replica') => preg_replace("[\n|\r|\n\r]", "",$row['PLAZOS REPLICA']),
            preg_replace("[\n|\r|\n\r]", "",'tecnico_nipsa') => preg_replace("[\n|\r|\n\r]", "",$row['TECNICO NIPSA']),
            preg_replace("[\n|\r|\n\r]", "",'proyecto_nipsa') => preg_replace("[\n|\r|\n\r]", "",$row['PROYECTO NIPSA']),
            preg_replace("[\n|\r|\n\r]", "",'pendiente_endesa') => preg_replace("[\n|\r|\n\r]", "",$row['PENDIENTE ENDESA']),
            preg_replace("[\n|\r|\n\r]", "",'plazo') => preg_replace("[\n|\r|\n\r]", "",$row['PLAZO']),
        ]);
    }
}
