<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {/*
        DB::table('tb_atendimentos')->insert([
            
            'cpf' => Str::random(10),
            'numero_atendimento' =>Str::random(10),
            'sufixo_atendimento' =>Str::random(10),
            'observacoes'=>Str::random(10),
            'data_atendimento'=>Str::random(10),
            'inicio_atendimento'=>Str::random(10),
            'fim_atendimento'=>str::random(10),
            'estado_atendimento'=>Str::random(10),
        ]);
        */
        DB::table('tb_atendimentos')->insert([
            'cpf' => Str::random(10),
            'numero_atendimento' => Str::random(10),
            'sufixo_atendimento' => 'PDG',
            'data_atendimento' => Str::random(10),
            'inicio_atendimento' => Str::random(10),
        ]);
    }
}
