<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_res');
            $table->date('fecha_res');
            $table->date('fecha_dev');
            $table->unsignedBigInteger('id_cli');
            $table->unsignedBigInteger('id_esc');
            $table->timestamps();
            
            // Definir la relación con la tabla clientes
            $table->foreign('id_cli')->references('id_cli')->on('clientes');

            // Definir la relación con la tabla escenarios_deportivos
            $table->foreign('id_esc')->references('id_esc')->on('escenarios_deportivos');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
