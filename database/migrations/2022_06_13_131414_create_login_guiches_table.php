<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginGuichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_login_guiches', function (Blueprint $table) {
            $table->increments('id_login_guiche')->unsigned();
            $table->string('login');
            $table->string('senha');
            $table->string('nome_funcionario');
            $table->enum('contrato_ativo', ['Sim', 'Não'])->default('Não');


            //protected $primaryKey =  'id_login_login', 'nomes_funcionarios';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_login_guiches');
    }
}
