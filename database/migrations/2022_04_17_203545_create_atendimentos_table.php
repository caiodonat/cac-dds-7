<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\QueryExeption;

class CreateAtendimentosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_atendimentos', function (Blueprint $table) {
            $table->integerIncrements('id_atendimento');
            $table->integer('cpf')->nullable();
            $table->integer('numero_atendimento');
            $table->enum('sufixo_atendimento', ['PDG', 'FCR', 'DRT', 'OTS']);
            $table->string('observacoes')->nullable();
            $table->date('date_emissao_atendimento');
            $table->dateTime('date_time_emissao_atendimento');
            $table->dateTime('inicio_atendimento')->nullable();
            $table->dateTime('fim_atendimento')->nullable();
            $table->enum('estado_fim_atendimento', ['nao_concluido', 'concluido'])->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_atendimento');
    }
}
