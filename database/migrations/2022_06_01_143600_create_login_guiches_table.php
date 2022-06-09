<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreateLoginGuichesTable extends Migration
{
    public function up()
    {

        Schema::create('tb_login_guiches', function (Blueprint $table) {
            $table->increments('id_login_guiche')->unsigned();
            $table->string('login');
            $table->string('senha');
            $table->string('nome_funcionario');
            $table->boolean('contrato_ativo');

            //protected $primaryKey =  'id_login_login', 'nomes_funcionarios';
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_login_guiches');
    }
}
