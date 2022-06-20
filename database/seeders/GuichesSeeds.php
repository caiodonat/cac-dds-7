<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GuichesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tb_login_guiches')->insert([
            'login' => Str::random(10),
            'senha' => Hash::make('123456'),
            'nome_funcionario' => Str::random(10),
            'contrato_ativo' => 'ativo'
        ]);

        DB::table('tb_guiches')->insert([
            'login' => Str::random(10),
            'senha' => Hash::make('123456'),
        ]);
    }
}
