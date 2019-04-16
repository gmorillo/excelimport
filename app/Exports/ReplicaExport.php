<?php

namespace App\Exports;

use App\Replica;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ReplicaExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Replica::query();
    }

    public function map($replicaexport): array
    {
        return [
            $replicaexport->tecnico_ede,
            $replicaexport->provincia,
            $replicaexport->departamento,
            $replicaexport->tipo,
            $replicaexport->gom,
            $replicaexport->solicitud,
            $replicaexport->descripcion,
            $replicaexport->fecha_encargo,
            $replicaexport->ads_odm,
            $replicaexport->protocolo_atlante,
            $replicaexport->fecha_diseno_atlante,
            $replicaexport->estado_atlante,
            $replicaexport->fin_atlante,
            $replicaexport->proyecto_agp,
            $replicaexport->estado_agp,
            $replicaexport->fin_agp,
            $replicaexport->finca,
            $replicaexport->tiempo_replica,
            $replicaexport->lca,
            $replicaexport->fecha_concluso,
            $replicaexport->ing_estudio,
            $replicaexport->observaciones,
            $replicaexport->plazos_atlante,
            $replicaexport->plazos_replica,
            $replicaexport->tecnico_nipsa,
            $replicaexport->proyecto_nipsa,
            $replicaexport->pendiente_endesa,
            $replicaexport->plazo,
        ];
    }

    public function headings(): array
    {
        return [
            'Tecnico EDE',
			'PROVINCIA',
			'DEPARTAMENTO',
			'TIPO',
			'GOM',
			'SOLICITUD',
			'DESCRIPCION',
			'FECHA ENCARGO', //H
			'AdS/odm',
			'Protocolo ATLANTE',
			'Fecha diseñado ATLANTE', //K
			'Estado ATLANTE',
			'Fin Atlante',
			'Proyecto AGP',
			'Estado AGP',
			'Fin AGP',
			'Finca',
			'TIEMPO DE REPLICA ',
			'LCA',
			'FECHA CONCLUSO', //T
			'ING ESTUDIO',
			'OBSERVACIONES',
			'PLAZOS ATLANTE',
			'PLAZOS REPLICA',
			'TECNICO NIPSA',
			'PROYECTO NIPSA',
			'PENDIENTE ENDESA',
			'PLAZO',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'K' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'T' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            //'H' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
        ];
    }
}



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	