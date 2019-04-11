<?php

namespace App\Exports;

use App\Globalet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class GlobaletExport implements WithColumnFormatting, FromQuery, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Globalet::query();
    }

    public function map($globaldataexport): array
    {
        return [
            $globaldataexport->ingenieria,
            $globaldataexport->zona,
            $globaldataexport->codigo_expediente,
            $globaldataexport->solicitud_principal,
            $globaldataexport->tipo,
            $globaldataexport->subtipo,
            $globaldataexport->descripcion_expediente,
            $globaldataexport->potencia_solicitada,
            $globaldataexport->tecnico_gestion_comercial,
            $globaldataexport->tecnico_gestion_tecnica,
            $globaldataexport->estado,
            $globaldataexport->estado_solicitud,
            $globaldataexport->fecha_asignacion,
            $globaldataexport->plazo_legal_contestacion,
            $globaldataexport->fecha_hora_apertura,
            $globaldataexport->fecha_contestacion,
            $globaldataexport->fecha_limite,
            $globaldataexport->departamento,
        ];
    }
    public function headings(): array
    {
        return [
            'Código de Expediente: Ingeniería',
            'Código de Expediente: Zona',
            'Código de Expediente: Código de Expediente',
            'Código de Expediente: Solicitud principal',
            'Tipo',
            'Subtipo',
            'Código de Expediente: Descripción del expediente',
            'Código de Expediente: Potencia solicitada',
            'Código de Expediente: Técnico Gestión Comercial',
            'Código de Expediente: Técnico Gestión Técnica',
            'Código de Expediente: Estado',
            'Estado solicitud',
            'Código de Expediente: Fecha de asignación a ingeniería', //M
            'Código de Expediente: Plazo legal contestación', 
            'Código de Expediente: Fecha y hora de apertura', //O
            'Código de Expediente: Fecha de contestación', //P
            'Fecha límite',//Q
            'DEPARTAMENTO',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'M' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'O' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'P' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'Q' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            //'H' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }
}
