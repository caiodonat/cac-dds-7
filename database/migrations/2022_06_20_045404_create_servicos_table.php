<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_servicos', function (Blueprint $table) {
            $table->increments('id_servicos')->unsigned();
            $table->enum('setor', ['PDG', 'FCR', 'SCT', 'OTS']);
            $table->string('servico');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tb_servicoes');
    }
}