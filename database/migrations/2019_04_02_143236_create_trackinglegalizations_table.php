<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackinglegalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackinglegalizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identificador_ede')->nullable();
            $table->string('trabajo_gom')->nullable();
            $table->string('identificador_ingenieria')->nullable();
            $table->string('organismos_implicados')->nullable();
            $table->string('tarea_tramitacion')->nullable();
            $table->string('fecha_generacion_tareas')->nullable();
            $table->string('tramite_gom')->nullable();
            $table->string('expediente_industria')->nullable();
            $table->string('pasado_ejecucion')->nullable();
            $table->string('estado_tarea')->nullable();
            $table->string('cfo')->nullable();
            $table->string('apm_resolucion_transmision')->nullable();
            $table->string('motivo_paralizacion')->nullable();
            $table->longText('comentarios')->nullable();
            $table->longText('desistimiento')->nullable();
            $table->string('expediente_finalizado')->nullable();
            $table->string('fecha_favorable_inicio_ejecucion')->nullable();
            $table->longText('estado_tramitacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackinglegalizations');
    }
}
