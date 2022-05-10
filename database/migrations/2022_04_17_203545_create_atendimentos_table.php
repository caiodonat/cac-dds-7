<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\QueryExeption;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tb_atendimentos', function (Blueprint $table) {

            $table->id('id_atendimento');
            $table->string('cpf')-> nullable(false) ->default('00000000000');
            $table->string('numero_atendimento');
            $table->enum('sufixo_atendimento', ['PDG', 'FCR', 'DRT', 'OTS']) -> default('PDG');
            $table->string('observacoes')->nullable();
            $table->time('data_atendimento');
            $table->time('emissao_atendimento');
            $table->time('inicio_atendimento')->nullable();
            $table->time('fim_atendimento')->nullable();
            $table->enum('estado_fim_atendimento', ['nao_concluido', 'concluido'])->nullable();

        });

    }

    public function down()
    {
        Schema::dropIfExists('tb_atendimentos');
    }
}
