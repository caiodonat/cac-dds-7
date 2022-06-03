<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\QueryExeption;

class CreateGuicheTable extends Migration
{
    public function up()
    {

        Schema::create('tb_guiches', function (Blueprint $table) {
            $table->increments('id_guiche')->unsigned();
            $table->unsignedInteger('id_login_guiches');
            $table->string('nomes_funcionarios');

            $table->foreign('id_login_guiche')->references('id_login_guiche')->on('tb_login_guiches');
            $table->foreign('id_guiche')->references('id_guiche')->on('tb_login_guiches');
            $table->foreign('nomes_funcionarios')->references('nomes_funcionarioss')->on('tb_login_guiches');

            $table->index(['id_guiche', 'id_login_guiche', 'nomes_funcionarios']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_guiches');
    }
}
