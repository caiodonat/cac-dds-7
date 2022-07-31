<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
//use Database\Seeders\DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Carbom Datetime
     * @return void
     */
    public function run()
    {
        /*
        DB::table('tb_atendentes')->insert([
            'cpf' => '12345678',
            'numero_atendimento' => '55',
            'sufixo_atendimento' => 'DRT',
            'observacoes' => Str::random(10),
            'data_atendimento' => '2020-04-18',
            'emissao_atendimento' => '2020-04-18 20:35:45',
            'inicio_atendimento' => '2020-04-18 16:35:45',
            'fim_atendimento' => '2020-04-18 16:50:46',
            'estado_atendimento' => 'concluido',
        ]);
        */
    }
}
