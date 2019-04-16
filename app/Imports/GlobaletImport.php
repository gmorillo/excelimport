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
            preg_replace("[\n|\r|\n\r]", "",'ingenieria')                =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Ingeniería']),
            preg_replace("[\n|\r|\n\r]", "",'zona')                      =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Zona']),
            preg_replace("[\n|\r|\n\r]", "",'codigo_expediente')         =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Código de Expediente']),
            preg_replace("[\n|\r|\n\r]", "",'solicitud_principal')       =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Solicitud principal']),
            preg_replace("[\n|\r|\n\r]", "",'tipo')                      =>  preg_replace("[\n|\r|\n\r]", "",$row['Tipo']),
            preg_replace("[\n|\r|\n\r]", "",'subtipo')                   =>  preg_replace("[\n|\r|\n\r]", "",$row['Subtipo']),
            preg_replace("[\n|\r|\n\r]", "",'descripcion_expediente')    =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Descripción del expediente']),
            preg_replace("[\n|\r|\n\r]", "",'potencia_solicitada')       =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Potencia solicitada']),
            preg_replace("[\n|\r|\n\r]", "",'tecnico_gestion_comercial') =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Técnico Gestión Comercial']),
            preg_replace("[\n|\r|\n\r]", "",'tecnico_gestion_tecnica')   =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Técnico Gestión Técnica']),
            preg_replace("[\n|\r|\n\r]", "",'estado')                    =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Estado']),
            preg_replace("[\n|\r|\n\r]", "",'estado_solicitud')          =>  preg_replace("[\n|\r|\n\r]", "",$row['Estado solicitud']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_asignacion')          =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Fecha de asignación a ingeniería']),
            preg_replace("[\n|\r|\n\r]", "",'plazo_legal_contestacion')  =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Plazo legal contestación']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_hora_apertura')       =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Fecha y hora de apertura']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_contestacion')        =>  preg_replace("[\n|\r|\n\r]", "",$row['Código de Expediente: Fecha de contestación']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_limite')              =>  preg_replace("[\n|\r|\n\r]", "",$row['Fecha límite']),
            preg_replace("[\n|\r|\n\r]", "",'departamento')              =>  preg_replace("[\n|\r|\n\r]", "",$row['DEPARTAMENTO']),
        ]);
    }
}


















