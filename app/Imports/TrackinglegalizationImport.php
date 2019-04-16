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
            preg_replace("[\n|\r|\n\r]", "",'identificador_ede') =>preg_replace("[\n|\r|\n\r]", "", $row['SOLICITUD NNSS']),
            preg_replace("[\n|\r|\n\r]", "",'trabajo_gom') =>preg_replace("[\n|\r|\n\r]", "", $row['TRABAJO GOM']),
            preg_replace("[\n|\r|\n\r]", "",'identificador_ingenieria') =>preg_replace("[\n|\r|\n\r]", "", $row['CODIGO NIPSA']),
            preg_replace("[\n|\r|\n\r]", "",'organismos_implicados') =>preg_replace("[\n|\r|\n\r]", "", $row['ORGANISMOS IMPLICADOS']),
            preg_replace("[\n|\r|\n\r]", "",'tarea_tramitacion') =>preg_replace("[\n|\r|\n\r]", "", $row['TAREA/LCA']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_generacion_tareas') =>preg_replace("[\n|\r|\n\r]", "", $row['FECHA GENERACIÓN 
TAREAS']),
            preg_replace("[\n|\r|\n\r]", "",'tramite_gom') =>preg_replace("[\n|\r|\n\r]", "",  $row['TRAMITE GOM']), 
            preg_replace("[\n|\r|\n\r]", "",'expediente_industria') =>preg_replace("[\n|\r|\n\r]", "",  $row['EXPTE INDUSTRIA']), 
            preg_replace("[\n|\r|\n\r]", "",'pasado_ejecucion') =>preg_replace("[\n|\r|\n\r]", "",  $row['PASADO A EJECUCIÓN']), 
            preg_replace("[\n|\r|\n\r]", "",'estado_tarea') =>preg_replace("[\n|\r|\n\r]", "",  $row['ESTADO TAREA']), 
            preg_replace("[\n|\r|\n\r]", "",'cfo') =>preg_replace("[\n|\r|\n\r]", "",  $row['CFO']), 
            preg_replace("[\n|\r|\n\r]", "",'apm_resolucion_transmision') =>preg_replace("[\n|\r|\n\r]", "",  $row['APM
RESOLUCION TRANSMISION']), 
            preg_replace("[\n|\r|\n\r]", "",'motivo_paralizacion') =>preg_replace("[\n|\r|\n\r]", "",  $row['MOTIVO PARALIZACION TRAMITACIÓN
Y/O NO FINALIZACION EXPTE']), 
            preg_replace("[\n|\r|\n\r]", "",'comentarios') =>preg_replace("[\n|\r|\n\r]", "",  $row['OBSERVACIONES']), 
            preg_replace("[\n|\r|\n\r]", "",'desistimiento') =>preg_replace("[\n|\r|\n\r]", "",  $row['DESISTIMIENTO']) ,
            preg_replace("[\n|\r|\n\r]", "",'expediente_finalizado') =>preg_replace("[\n|\r|\n\r]", "",  $row['EXPTE FINALIZADO']) ,
            preg_replace("[\n|\r|\n\r]", "",'fecha_favorable_inicio_ejecucion') =>preg_replace("[\n|\r|\n\r]", "",  $row['FECHA FAVORABLE INICIO EJECUCION']), 
            preg_replace("[\n|\r|\n\r]", "",'estado_tramitacion') =>preg_replace("[\n|\r|\n\r]", "",  $row['ESTADO TRAMITACION']) 
        ]);
    }
}

