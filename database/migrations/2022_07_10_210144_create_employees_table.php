<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('tb_employees', function (Blueprint $table) {
            $table->increments('id_employee');
            $table->string('name')->nullable();
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->boolean('contract_active')->default(true);
        });
        /*
        Schema::create('tb_employees', function (Blueprint $table) {
            $table->foreign('id_token_employee')->references('token')->on('tb_tokens');
        });
        */
    }

    public function down()
    {
        Schema::dropIfExists('tb_employees');
    }
}
