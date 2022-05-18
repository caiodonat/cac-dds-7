<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AtendimentoSeeder extends Seeder
{
    public function run()
    {
        //$sufixo_atendimentoe -> faker -> randomElement(['PDG', 'FCR', 'DRT', 'OTS']);
        DB::table('tb_atendimentos')->insert([
            'cpf' => '01010101',
            'numero_atendimento' => '01',
            'sufixo_atendimento' => 'OTS',
            'data_atendimento' =>  '2020-01-01',
            'inicio_atendimento' => Str::random(10),
        ]);
    }
}
