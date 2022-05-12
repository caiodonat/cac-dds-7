<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\QueryExeption;

class CreateAtendimentosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_atendentes', function (Blueprint $table) {
            $table->increments('id_atendimentos');
            $table->int('cpf');
            $table->int('numero_atendimento');
            $table->enum('sufixo_atendimento', ['PDG', 'FCR', 'DRT', 'OTS'])->default('PDG');
            $table->string('observacoes')->nullable();
            $table->date('data_atendimento');
            $table->timestamp('emissao_atendimento');
            $table->dateTime('inicio_atendimento')->nullable();
            $table->dateTime('fim_atendimento')->nullable();
            $table->enum('estado_fim_atendimento', ['nao_concluido', 'concluido'])->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_atendentes');
    }
}
