<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscenariosDeportivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escenarios_deportivos', function (Blueprint $table) {
            $table->id('id_esc');
            $table->date('fecha_dis');
            $table->string('nombre_esc');
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
        Schema::dropIfExists('escenarios_deportivos');
    }
}
