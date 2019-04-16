<?php

namespace App\Imports;

use App\Projectlegalization;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProjectlegalizationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Projectlegalization([
            preg_replace("[\n|\r|\n\r]", "",'provincia') =>  preg_replace("[\n|\r|\n\r]", "",$row['PROVINCIA']),
            preg_replace("[\n|\r|\n\r]", "",'codigo_nipsa') =>  preg_replace("[\n|\r|\n\r]", "",$row['CODIGO NIPSA']),
            preg_replace("[\n|\r|\n\r]", "",'tarea_proyecto') =>  preg_replace("[\n|\r|\n\r]", "",$row['TAREA PROYECTO']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_encargo') =>  preg_replace("[\n|\r|\n\r]", "",$row['FECHA ENCARGO']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_entrega') =>  preg_replace("[\n|\r|\n\r]", "",$row['FECHA ENTREGA']),
            preg_replace("[\n|\r|\n\r]", "",'titulo_encargo') =>  preg_replace("[\n|\r|\n\r]", "", $row['TITULO ENCARGO O PROYECTO']),
            preg_replace("[\n|\r|\n\r]", "",'tecnico_endesa') =>  preg_replace("[\n|\r|\n\r]", "",$row['TECNICO ENDESA']),
            preg_replace("[\n|\r|\n\r]", "",'tipo_trabajo') =>  preg_replace("[\n|\r|\n\r]", "",$row['TIPO TRABAJO']),
            preg_replace("[\n|\r|\n\r]", "",'poblacion') =>  preg_replace("[\n|\r|\n\r]", "",$row['POBLACIÓN']),
            preg_replace("[\n|\r|\n\r]", "",'codigo_centro') =>  preg_replace("[\n|\r|\n\r]", "",$row['CÓDIGO DE CENTRO
 Y/O TRAZA
NOMBRE DE LÍNEA']),
            preg_replace("[\n|\r|\n\r]", "",'propiedad') => preg_replace("[\n|\r|\n\r]", "",$row['PROPIEDAD']),
            preg_replace("[\n|\r|\n\r]", "",'tipo') =>  preg_replace("[\n|\r|\n\r]", "",$row['TIPO']),
            preg_replace("[\n|\r|\n\r]", "",'legal') =>  preg_replace("[\n|\r|\n\r]", "",$row['LEGAL']),
            preg_replace("[\n|\r|\n\r]", "",'departamento') =>  preg_replace("[\n|\r|\n\r]", "",$row['DEPARTAMENTO']),
            preg_replace("[\n|\r|\n\r]", "",'solicitud_nnss') =>  preg_replace("[\n|\r|\n\r]", "",$row['SOLICITUD NNSS']),
            preg_replace("[\n|\r|\n\r]", "",'trabajo_gom') => preg_replace("[\n|\r|\n\r]", "",$row['TRABAJO GOM']),
            preg_replace("[\n|\r|\n\r]", "",'organismos_implicados') => preg_replace("[\n|\r|\n\r]", "",$row['ORGANISMOS IMPLICADOS']),
            preg_replace("[\n|\r|\n\r]", "",'tarea_lca') =>  preg_replace("[\n|\r|\n\r]", "",$row['TAREA/LCA']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_generacion') =>  preg_replace("[\n|\r|\n\r]", "",$row['FECHA GENERACIÓN 
TAREAS']),
            preg_replace("[\n|\r|\n\r]", "",'tramite_gom') =>  preg_replace("[\n|\r|\n\r]", "",$row['TRAMITE GOM']),
            preg_replace("[\n|\r|\n\r]", "",'expte_industria') =>  preg_replace("[\n|\r|\n\r]", "",$row['EXPTE INDUSTRIA']),
            preg_replace("[\n|\r|\n\r]", "",'pasado_ejecucion') =>  preg_replace("[\n|\r|\n\r]", "",$row['PASADO A EJECUCIÓN']),
            preg_replace("[\n|\r|\n\r]", "",'estado_tarea') =>  preg_replace("[\n|\r|\n\r]", "",$row['ESTADO TAREA']),
            preg_replace("[\n|\r|\n\r]", "",'cfo') =>  preg_replace("[\n|\r|\n\r]", "",$row['CFO']),
            preg_replace("[\n|\r|\n\r]", "",'apm') =>  preg_replace("[\n|\r|\n\r]", "",$row['APM
RESOLUCION TRANSMISION']),
            preg_replace("[\n|\r|\n\r]", "",'motivo_paralizacion') =>  preg_replace("[\n|\r|\n\r]", "",$row['MOTIVO PARALIZACION TRAMITACIÓN
Y/O NO FINALIZACION EXPTE']),
            preg_replace("[\n|\r|\n\r]", "",'observaciones') =>  preg_replace("[\n|\r|\n\r]", "",$row['OBSERVACIONES']),
            preg_replace("[\n|\r|\n\r]", "",'desistimiento') =>  preg_replace("[\n|\r|\n\r]", "",$row['DESISTIMIENTO']),
            preg_replace("[\n|\r|\n\r]", "",'expediente_finalizado') =>  preg_replace("[\n|\r|\n\r]", "",$row['EXPTE FINALIZADO']),
            preg_replace("[\n|\r|\n\r]", "",'fecha_favorable') =>  preg_replace("[\n|\r|\n\r]", "",$row['FECHA FAVORABLE INICIO EJECUCION']),
            preg_replace("[\n|\r|\n\r]", "",'estado_tramitacion') =>  preg_replace("[\n|\r|\n\r]", "",$row['ESTADO TRAMITACION']),
            preg_replace("[\n|\r|\n\r]", "",'dias_plazo') => preg_replace("[\n|\r|\n\r]", "",$row['Días Plazo']),
        ]);
    }
}