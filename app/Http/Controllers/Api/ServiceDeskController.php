<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceDesk as ServiceDesk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceDeskController extends Controller
{
  //POST

    public function post(Request $rt)
    {
        try {
            $newS = new ServiceDesk();
            $cNow = Carbon::now('-03:00');

            $newS->number_desk = $rt->input('number_desk');
            $newS->id_user = $rt->input('id_user');
            if(!$newS->opening = $rt->input('opening')){
                $newS->opening = $cNow->toDateTimeString();
            }

            $newS->save();

            $r = DB::table('tb_service_desks')
            ->where('id_service_desk', $newS->id_service_desk)
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }


    //GET

    public function id($id)
    {
        try {
            $r = DB::table('tb_service_desks')
            ->where('id_service_desk', $id)
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }


    //PUT

    public function close(Request $rt)
    {
        try {
            $cNow = Carbon::now('-03:00');

            DB::table('td_service_desk')
            ->where('id_service_desk', $rt->input('id_service_desk'))
            ->update(['closing' => $cNow->toDateTimeString()]);

            $r = DB::table('tb_service_desks')
            ->where('id_service_desk', $rt->input('id_service_desk'))
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }
}
