<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeyFromFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('funcionarios', function (Blueprint $table) {
        $table->dropForeign(['user_id']); // Elimina la clave foránea
    });
}

public function down()
{
    Schema::table('funcionarios', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Restaura la clave foránea
    });
}
}
