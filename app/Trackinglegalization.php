<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trackinglegalization extends Model
{
    protected $fillable = [
    	'identificador_ede',
    	'trabajo_gom',
		'identificador_ingenieria',
		'organismos_implicados',
		'tarea_tramitacion',
		'fecha_generacion_tareas',
		'tramite_gom',
		'expediente_industria',
		'pasado_ejecucion',
		'estado_tarea',
		'cfo',
		'apm_resolucion_transmision',
		'motivo_paralizacion',
		'comentarios',
		'desistimiento',
		'expediente_finalizado',
		'fecha_favorable_inicio_ejecucion',
		'estado_tramitacion',
		
	];
}
