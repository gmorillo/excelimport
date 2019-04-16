<?php

namespace App\Imports;

use App\Trackinglegalization;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TrackinglegalizationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Trackinglegalization([
            'identificador_ede' => $row['SOLICITUD NNSS'],
            'trabajo_gom' => $row['TRABAJO GOM'],
            'identificador_ingenieria' => $row['CODIGO NIPSA'],
            'organismos_implicados' => $row['ORGANISMOS IMPLICADOS'],
            'tarea_tramitacion' => $row['TAREA/LCA'],
            'fecha_generacion_tareas' => $row['FECHA GENERACIÓN 
TAREAS'],
            'tramite_gom' =>  $row['TRAMITE GOM'], 
            'expediente_industria' =>  $row['EXPTE INDUSTRIA'], 
            'pasado_ejecucion' =>  $row['PASADO A EJECUCIÓN'], 
            'estado_tarea' =>  $row['ESTADO TAREA'], 
            'cfo' =>  $row['CFO'], 
            'apm_resolucion_transmision' =>  $row['APM
RESOLUCION TRANSMISION'], 
            'motivo_paralizacion' =>  $row['MOTIVO PARALIZACION TRAMITACIÓN
Y/O NO FINALIZACION EXPTE'], 
            'comentarios' =>  $row['OBSERVACIONES'], 
            'desistimiento' =>  $row['DESISTIMIENTO'] ,
            'expediente_finalizado' =>  $row['EXPTE FINALIZADO'] ,
            'fecha_favorable_inicio_ejecucion' =>  $row['FECHA FAVORABLE INICIO EJECUCION'], 
            'estado_tramitacion' =>  $row['ESTADO TRAMITACION'] 
        ]);
    }
}

