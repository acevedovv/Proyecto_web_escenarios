<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropFuncionariosTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('funcionarios');
    }

    public function down()
    {

    }
}
