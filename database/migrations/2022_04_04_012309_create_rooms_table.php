<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * The database connection thar should be used by the migration.
     * 
     * @var string
     */
    protected $connection = 'mysql';

    protected $table = 'room';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->string('dia');
            $table->string('inicio');
            $table->string('fim');
            $table->string('turma');
            $table->string('instrutor');
            $table->string('unidade');
            $table->string('ambiente');
            $table->string('tipo');
            $table->timestamps();
        });
        
        /*
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('start_time');
            $table->string('end_time');
            $table->string('class_id');
            $table->string('instructor');
            $table->enum('bloc', ['A', 'B', 'C', 'D'])->default('A');
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
