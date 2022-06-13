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
            'data_emissao_atendimento' => '2020-04-17',
            'data_time_emissao_atendimento' => '2020-04-17 17:12:50',
            'cpf' => '12345678901',
            'numero_atendimento' => '15',
            'sufixo_atendimento' => 'pdg',
            'servicos' => 'serviço 1,serviço 2,serviço 3,serviço 4,serviço 5',
            'observacoes' => 'taltaltaltaltaltaltaltal',
            'first_call' => Str::random(11),
            'inicio_atendimento' => '2020-04-17 17:12:50',
            'fim_atendimento' => '2020-04-17 18:12:50',
            'status_atendimento' => Str::random(11),

        ]);
    }
}
