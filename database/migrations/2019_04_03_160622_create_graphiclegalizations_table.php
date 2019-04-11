<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphiclegalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphiclegalizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes');
            $table->integer('encargados_mes');
            $table->integer('terminados_mes');
            $table->integer('fuera_plazo');
            $table->integer('pasado_ejecucion');
            $table->integer('administracion');
            $table->integer('contrata');
            $table->integer('endesa');
            $table->integer('ingenieria');
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
        Schema::dropIfExists('graphiclegalizations');
    }
}
