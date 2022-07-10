<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDesksTable extends Migration
{
    public function up()
    {
        Schema::create('service_desks', function (Blueprint $table) {
            $table->increments('id_service_desk');
            $table->enum('number_desk', [1, 2, 3, 4]);
            $table->unsignedInteger('id_employee');//FK
            $table->dateTime('opening');
            $table->dateTime('closing')->nullable();
        });
        
        Schema::table('service_desks', function (Blueprint $table) {
            $table->foreign('id_employee')->references('id_employee')->on('employees');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_desks');
    }
}