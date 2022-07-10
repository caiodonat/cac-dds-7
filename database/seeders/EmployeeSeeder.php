<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            [
                'name' => 'Caio H. Donat',
                'login' => 'caio_donat',
                'password' => '12345678',
            ]
        ]);
    }
}