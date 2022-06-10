<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreateAtendimentosTable extends Migration
{
    public function up()
    {

        Schema::create('tb_atendimentos', function (Blueprint $table) {
            $table->increments('id_atendimento')->unsigned();
            $table->date('date_emissao_atendimento');
            $table->dateTime('date_time_emissao_atendimento');

            $table->bigInteger('cpf')->unsigned()->nullable(); //bigIncrements->(8-byte)
            $table->integer('numero_atendimento');
            $table->enum('sufixo_atendimento', ['PDG', 'FCR', 'SCT', 'OTS']);
            $table->string('servicos')->nullable();//serviço 1,serviço 2,serviço 3,serviço 4,serviço 5
            $table->string('observacoes')->nullable();

            $table->dateTime('first_call')->nullable();
            $table->dateTime('inicio_atendimento')->nullable();
            $table->dateTime('fim_atendimento')->nullable();
            //$table->enum('estado_fim_atendimento', ['nao_concluido', 'concluido'])->nullable();
            $table->enum('status_atendimento', ['chamando', 'aguardando', 'em_atendimento', 'nao_compareceu', 'nao_concluido', 'concluido'])->nullable();

            //Em Teste para viabilidade da array
            $collection = collect(['sufixoTotem' => 'pedagógico', 'finaceiro', 'secretaria', 'outros servicos'])->toArray();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_atendimentos');
    }
}
