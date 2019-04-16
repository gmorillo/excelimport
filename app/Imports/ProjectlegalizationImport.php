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
            'provincia' =>  $row['PROVINCIA'],
            'codigo_nipsa' =>  $row['CODIGO NIPSA'],
            'tarea_proyecto' =>  $row['TAREA PROYECTO'],
            'fecha_encargo' =>  $row['FECHA ENCARGO'],
            'fecha_entrega' =>  $row['FECHA ENTREGA'],
            'titulo_encargo' =>  preg_replace("[\n|\r|\n\r]", " ", $row['TITULO ENCARGO O PROYECTO']),
            'tecnico_endesa' =>  $row['TECNICO ENDESA'],
            'tipo_trabajo' =>  $row['TIPO TRABAJO'],
            'poblacion' =>  $row['POBLACIÓN'],
            'codigo_centro' =>  $row['CÓDIGO DE CENTRO
 Y/O TRAZA
NOMBRE DE LÍNEA'],
            'propiedad' => $row['PROPIEDAD'],
            'tipo' =>  $row['TIPO'],
            'legal' =>  $row['LEGAL'],
            'departamento' =>  $row['DEPARTAMENTO'],
            'solicitud_nnss' =>  $row['SOLICITUD NNSS'],
            'trabajo_gom' => $row['TRABAJO GOM'],
            'organismos_implicados' => $row['ORGANISMOS IMPLICADOS'],
            'tarea_lca' =>  $row['TAREA/LCA'],
            'fecha_generacion' =>  $row['FECHA GENERACIÓN 
TAREAS'],
            'tramite_gom' =>  $row['TRAMITE GOM'],
            'expte_industria' =>  $row['EXPTE INDUSTRIA'],
            'pasado_ejecucion' =>  $row['PASADO A EJECUCIÓN'],
            'estado_tarea' =>  $row['ESTADO TAREA'],
            'cfo' =>  $row['CFO'],
            'apm' =>  $row['APM
RESOLUCION TRANSMISION'],
            'motivo_paralizacion' =>  $row['MOTIVO PARALIZACION TRAMITACIÓN
Y/O NO FINALIZACION EXPTE'],
            'observaciones' =>  $row['OBSERVACIONES'],
            'desistimiento' =>  $row['DESISTIMIENTO'],
            'expediente_finalizado' =>  $row['EXPTE FINALIZADO'],
            'fecha_favorable' =>  $row['FECHA FAVORABLE INICIO EJECUCION'],
            'estado_tramitacion' =>  $row['ESTADO TRAMITACION'],
            'dias_plazo' => $row['Días Plazo'],
        ]);
    }
}