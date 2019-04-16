<?php

namespace App\Imports;

use App\Globalet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class GlobaletImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Globalet([
            'ingenieria'                =>  $row['Código de Expediente: Ingeniería'],
            'zona'                      =>  $row['Código de Expediente: Zona'],
            'codigo_expediente'         =>  $row['Código de Expediente: Código de Expediente'],
            'solicitud_principal'       =>  $row['Código de Expediente: Solicitud principal'],
            'tipo'                      =>  $row['Tipo'],
            'subtipo'                   =>  $row['Subtipo'],
            'descripcion_expediente'    =>  $row['Código de Expediente: Descripción del expediente'],
            'potencia_solicitada'       =>  $row['Código de Expediente: Potencia solicitada'],
            'tecnico_gestion_comercial' =>  $row['Código de Expediente: Técnico Gestión Comercial'],
            'tecnico_gestion_tecnica'   =>  $row['Código de Expediente: Técnico Gestión Técnica'],
            'estado'                    =>  $row['Código de Expediente: Estado'],
            'estado_solicitud'          =>  $row['Estado solicitud'],
            'fecha_asignacion'          =>  $row['Código de Expediente: Fecha de asignación a ingeniería'],
            'plazo_legal_contestacion'  =>  $row['Código de Expediente: Plazo legal contestación'],
            'fecha_hora_apertura'       =>  $row['Código de Expediente: Fecha y hora de apertura'],
            'fecha_contestacion'        =>  $row['Código de Expediente: Fecha de contestación'],
            'fecha_limite'              =>  $row['Fecha límite'],
            'departamento'              =>  $row['DEPARTAMENTO'],
        ]);
    }
}


















