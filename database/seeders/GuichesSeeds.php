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

        DB::tbale('tb_login_guiches')->insert([
            'id_login_guiches' => Str::random(10),
            'login' => Str::random(10),
            'senha' => Hash::make('123456'),
            'nomes_funcionarios' => Str::random(10),
            'cadastro_ativo' => 'ativo'
        ]);
    }
}
