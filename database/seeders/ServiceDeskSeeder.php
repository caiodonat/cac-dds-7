<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class ServiceDeskSeeder extends Seeder
{
    public function run()
    {
        $carbonNow = Carbon::now('-03:00');
        DB::table('service_desks')->insert([
            
            [
                'number_desk' => '1',
                'id_employee' => '1',
                'opening' => $carbonNow->toDateTimeString(),
            ]
        ]);
    }
}