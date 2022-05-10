<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_atendimentos')->insert([
            'cpf' => Str::random(11),
            'numero_atendimento' => Str::random(11),
            'sufixo_atendimento' => 'PDG',
            'observacoes' => Str::random(11),
            'data_atendimento' => '00:00:00',
            'emissao_atendimento' => '00:00:00',
            'inicio_atendimento' => '00:00:00',
            'fim_atendimento' => '00:00:00',
            'estado_fim_atendimento' => 'nao_concluido',

        ]);

        User::factory()
            ->count(10)
            ->create();
        }
}
