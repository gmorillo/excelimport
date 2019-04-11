<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectlegalization extends Model
{
    protected $fillable = [
    	'provincia',
		'codigo_nipsa',
		'tarea_proyecto',
		'fecha_encargo',
		'fecha_entrega',
		'titulo_encargo',
		'tecnico_endesa',
		'tipo_trabajo',
		'poblacion',
		'codigo_centro',
		'propiedad',
		'tipo',
		'legal',
		'departamento',
		'solicitud_nnss',
		'trabajo_gom',
		'organismos_implicados',
		'tarea_lca',
		'fecha_generacion',
		'tramite_gom',
		'expte_industria',
		'pasado_ejecucion',
		'estado_tarea',
		'cfo',
		'apm',
		'motivo_paralizacion',
		'observaciones',
		'desistimiento',
		'expediente_finalizado',
		'fecha_favorable',
		'estado_tramitacion',
		'dias_plazo',
    ];
}
