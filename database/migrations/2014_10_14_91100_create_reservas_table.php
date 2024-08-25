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
        #Schema::dropIfExists('reservas');
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('id_res');
            $table->date('fecha_res');
            $table->date('fecha_dev');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_esc');
            $table->timestamps();
            
            // Definir la relación con la tabla usuarios
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Definir la relación con la tabla escenarios_deportivos
            $table->foreign('id_esc')->references('id_esc')->on('escenarios_deportivos')->onDelete('cascade');
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
