<?php

namespace App\Exports;

use App\Projectlegalization;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProjectlegalizationExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Projectlegalization::query();
    }
    
    public function map($projectlegalization): array
    {
        return [
            $projectlegalization->provincia,
            $projectlegalization->codigo_nipsa,
            $projectlegalization->tarea_proyecto,
            $projectlegalization->fecha_encargo,
            $projectlegalization->fecha_entrega,
            $projectlegalization->titulo_encargo,
            $projectlegalization->tecnico_endesa,
            $projectlegalization->tipo_trabajo,
            $projectlegalization->poblacion,
            $projectlegalization->codigo_centro,
            $projectlegalization->propiedad,
            $projectlegalization->tipo,
            $projectlegalization->legal,
            $projectlegalization->departamento,
            $projectlegalization->solicitud_nnss,
            $projectlegalization->trabajo_gom,
            $projectlegalization->organismos_implicados,
            $projectlegalization->tarea_lca,
            $projectlegalization->fecha_generacion,
            $projectlegalization->tramite_gom,
            $projectlegalization->expte_industria,
            $projectlegalization->pasado_ejecucion,
            $projectlegalization->estado_tarea,
            $projectlegalization->cfo,
            $projectlegalization->apm,
            $projectlegalization->motivo_paralizacion,
            $projectlegalization->observaciones,
            $projectlegalization->desistimiento,
            $projectlegalization->expediente_finalizado,
            $projectlegalization->fecha_favorable,
            $projectlegalization->estado_tramitacion,
            //$projectlegalization->dias_plazo,

            //Date::dateTimeToExcel($projectlegalization->created_at),
            //Date::dateTimeToExcel($projectlegalization->updated_at),

            /*Date::dateTimeToExcel($projectlegalization->fecha_pedido),
            Date::dateTimeToExcel($projectlegalization->fecha_entrega),*/
        ];
    }
    public function headings(): array
    {
        return [
            'PROVINCIA',
            'CODIGO NIPSA',
            'TAREA PROYECTO',
            'FECHA ENCARGO',//D
            'FECHA ENTREGA',//E
            'TITULO ENCARGO O PROYECTO',
            'TECNICO ENDESA',
            'TIPO TRABAJO',
            'POBLACIÓN',
            'CÓDIGO DE CENTRO
 Y/O TRAZA
NOMBRE DE LÍNEA',
            'PROPIEDAD',
            'TIPO',
            'LEGAL',
            'DEPARTAMENTO',
            'SOLICITUD NNSS',
            'TRABAJO GOM',
            'ORGANISMOS IMPLICADOS',
            'TAREA/LCA',
            'FECHA GENERACIÓN 
TAREAS', //R
            'TRAMITE GOM',
            'EXPTE INDUSTRIA',
            'PASADO A EJECUCIÓN',
            'ESTADO TAREA',
            'CFO',
            'APM
RESOLUCION TRANSMISION',
            'MOTIVO PARALIZACION TRAMITACIÓN
Y/O NO FINALIZACION EXPTE',
            'OBSERVACIONES',
            'DESISTIMIENTO',
            'EXPTE FINALIZADO',
            'FECHA FAVORABLE INICIO EJECUCION',//AA
            'ESTADO TRAMITACION',
            //'Días Plazo',
        ];
    }

    

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'R' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'AA' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            //'H' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }
}