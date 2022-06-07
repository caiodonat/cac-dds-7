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
        Schema::create('login_guiches', function (Blueprint $table) {
            $table->id('id_login_guiches')->unsigned();
            $table->string('login')->nullable();
            $table->string('senha')->nullable();
            $table->string('nomes_funcionarios')->nullable();
            $table->enum('cadastros_ativos', ['ativo', 'inativo'])->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_guiches');
    }
}
