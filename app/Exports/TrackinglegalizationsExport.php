<?php

namespace App\Exports;

use App\Trackinglegalization;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TrackinglegalizationsExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Trackinglegalization::query();
    }

    public function map($rackinglegalization): array
    {
        return [
            $rackinglegalization->identificador_ede.'-'.$rackinglegalization->trabajo_gom,
            $rackinglegalization->identificador_ingenieria,
            $rackinglegalization->organismos_implicados,
            $rackinglegalization->tarea_tramitacion,
            $rackinglegalization->fecha_generacion_tareas,
            $rackinglegalization->tramite_gom,
            $rackinglegalization->expediente_industria,
            $rackinglegalization->pasado_ejecucion,
            $rackinglegalization->estado_tarea,
            $rackinglegalization->cfo,
            $rackinglegalization->apm_resolucion_transmision,
            $rackinglegalization->motivo_paralizacion,
            $rackinglegalization->comentarios,
            $rackinglegalization->desistimiento,
            $rackinglegalization->expediente_finalizado,
            $rackinglegalization->fecha_favorable_inicio_ejecucion,
            $rackinglegalization->estado_tramitacion,
            //Date::dateTimeToExcel($rackinglegalization->created_at),
            //Date::dateTimeToExcel($rackinglegalization->updated_at),

            /*Date::dateTimeToExcel($rackinglegalization->fecha_pedido),
            Date::dateTimeToExcel($rackinglegalization->fecha_entrega),*/
        ];
    }

    public function headings(): array
    {
        return [
            'SOLICITUD NNSS',
            'CODIGO NIPSA',
            'ORGANISMOS IMPLICADOS',
            'TAREA/LCA',
            'FECHA GENERACIÓN TAREAS',
            'TRÁMITE GOM',
            'EXPTE. INDUSTRIA',
            'PASADO A EJECUCIÓN',
            'ESTADO TAREA',
            'CFO',
            'APM RESOLUCIÓN TRANSMISIÓN',
            'MOTIVO PARALIZACIÓN TRAMITACIÓN',
            'COMENTARIOS',
            'DESISTIMIENTO',
            'EXPTE. FINALIZADO',
            'FECHA FAVORABLE INICIO EJECUCIÓN',
            'ESTADO TRAMITACIÓN',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            //'H' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }
}



            