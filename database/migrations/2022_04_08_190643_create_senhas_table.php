<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senhas', function (Blueprint $table) {
            $table->id();
            $table->enum("estado_atual",["nao_atendido","em_atendimento","em_espera", "finalizado"])->default("em_espera");
            $table->string("numero");
            $table->string("sufixo");
            $table->string("cpf");
            $table->time("inicio_atendimento", $time = 0);
            $table->timestamps();//tempo_criacao||tempo_finalizacao
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('senhas');
    }
}
