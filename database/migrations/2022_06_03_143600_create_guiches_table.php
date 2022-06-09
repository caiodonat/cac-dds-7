<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreateGuichesTable extends Migration
{
    public function up()
    {

        Schema::create('tb_guiches', function (Blueprint $table) {
            $table->increments('id_guiche')->unsigned();
            $table->unsignedInteger('id_login_guiche');
            $table->string('nomes_funcionario');

            /*
            $table->foreign('id_login_guiche')->references('id_login_guiche')->on('tb_login_guiches');
            $table->foreign('nomes_funcionario')->references('nomes_funcionario')->on('tb_login_guiches');

            //$table->foreign('id_guiche')->references('id_guiche')->on('tb_login_guiches');

            $table->index(['id_guiche', 'id_login_guiche', 'nome_funcionario']);
            */
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_guiches');
    }
}
