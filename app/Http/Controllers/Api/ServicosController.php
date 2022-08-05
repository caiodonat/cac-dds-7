<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ServicosController extends Controller
{
    public function post(Request $rt)
    {
        try {
            $newS = new Servicos();

            $newS->setor = $rt->input('setor');
            $newS->servico = $rt->input('servico');
            $newS->save();

            $r = DB::table('tb_servicos')
            ->where('id_servicos', $newS->id_servicos)
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }
    
    public function getId($id)
    {
        try {
            $r = DB::table('tb_servicos')
            ->where('id_servicos', $id)
            ->value('servico');

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }

    public function getPDG()
    {
        try {
            $r = DB::table('tb_servicos')
            ->where('setor', 'PDG')
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }

    public function getFCR()
    {
        try{
            $r = DB::table('tb_servicos')
            ->where('setor', 'FCR')
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }

    public function getSCT()
    {
        try{
            $r = DB::table('tb_servicos')
            ->where('setor', 'SCT')
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }

    public function getOTS()
    {
        try{
            $r = DB::table('tb_servicos')
            ->where('setor', 'OTS')
            ->get();

            return json_encode(['r'=>$r, 'success'=>true], JSON_PRETTY_PRINT);
        } catch (\Throwable $th) {
            return json_encode(['r'=>$th, 'success'=>false], JSON_PRETTY_PRINT);
        }
    }
    
}
