<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackingprojects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identificador_ede')->nullable();
            $table->string('trabajo_gom')->nullable();
            $table->string('tipo')->nullable();
            $table->string('identificador_ingenieria')->nullable();
            $table->string('lca')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('topologia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('fecha_pedido')->nullable();
            $table->string('fecha_entrega')->nullable();
            $table->string('plazo')->nullable();
            $table->string('provincia')->nullable();
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
        Schema::dropIfExists('trackingprojects');
    }
}
