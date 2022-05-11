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

        DB::table('tb_atendimentos')->insert([
            'cpf' => '12345678901',
            'numero_atendimento' => '1',
            'sufixo_atendimento' => 'PDG',
            'observacoes' => 'ontem',
            'emissao_atendimento' => '10:11:12',
            'data_atendimento' => '13:14:15',
            'inicio_atendimento' => '16:17:18',
            'fim_atendimento' => '19:20:21',
            //'estado_atendimento'=>'nao_concluido',
        ]);

        DB::table('tb_atendimentos')->insert([
            'cpf' => '123456789',
            'numero_atendimento' => '2',
            'sufixo_atendimento' => 'FCR',
            'observacoes' => 'hoje',
            'emissao_atendimento' => '22:23:24',
            'data_atendimento' => '25:26:27',
            'inicio_atendimento' => '28:29:30',
            'fim_atendimento' => '31:32:33',
            //'estado_atendimento'=>'nao_concluido',
        ]);

        DB::table('tb_atendimentos')->insert([
            'cpf' => '12345678901',
            'numero_atendimento' => '3',
            'sufixo_atendimento' => 'OTS',
            'observacoes' => 'amanha',
            'emissao_atendimento' => '34:35:36',
            'data_atendimento' => '37:38:39',
            'inicio_atendimento' => '40:41:42',
            'fim_atendimento' => '43:44:45',
            //'estado_atendimento'=>'nao_concluido',
        ]);
    }
}
