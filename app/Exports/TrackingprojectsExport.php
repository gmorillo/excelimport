<?php

namespace App\Exports;

use App\Trackingproject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TrackingprojectsExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Trackingproject::query();
    }

    public function map($trackingproject): array
    {
        return [
            $trackingproject->identificador_ede . '-' . $trackingproject->trabajo_gom,
            $trackingproject->identificador_ingenieria,
            $trackingproject->lca,
            $trackingproject->descripcion,
            $trackingproject->topologia.'-'.$trackingproject->tipo,
            $trackingproject->municipio.'-'.$trackingproject->provincia,
            $trackingproject->fecha_pedido,
            $trackingproject->fecha_entrega,
            $trackingproject->plazo,
            //Date::dateTimeToExcel($trackingproject->created_at),
            //Date::dateTimeToExcel($trackingproject->updated_at),

            /*Date::dateTimeToExcel($trackingproject->fecha_pedido),
            Date::dateTimeToExcel($trackingproject->fecha_entrega),*/
        ];
    }

    public function headings(): array
    {
        return [
            'IDENTIFICADOR EDE',
            'CÓDIGO NIPSA',
            'TAREA/LCA',
            'DESCRIPCIÓN',
            'TOPOLOGÍA',
            'MUNICIPIO',
            'FECHA ENCARGO',
            'FECHA ENTREGA',
            'DÍAS PLAZO',
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