<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalcalidadetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globalcalidadets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes')->nullable();
            $table->integer('encargados_mes')->nullable();
            $table->integer('terminados_mes')->nullable();
            $table->integer('pendiente_datos')->nullable();
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
        Schema::dropIfExists('globalcalidadets');
    }
}





