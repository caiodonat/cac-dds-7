<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use App\Http\Controllers\Controller;
use App\Models\Servicos as Servicos;
use DB;

class ServicosController extends Controller
{
    public function getPDG()
    {
        $servicos = DB::table('tb_servicos')
        ->where("setor", "PDG")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
    public function getFCR()
    {
        $servicos = DB::table('tb_servicos')
        ->where("setor", "FCR")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
    public function getSCT()
    {
        $servicos = DB::table('tb_servicos')
        ->where("setor", "SCT")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
    public function getOTS()
    {
        $servicos = DB::table('tb_servicos')
        ->where("setor", "OTS")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
    public function postServico($setor, $servico)
    {
            $newServico = new Servicos();
        try {
            $newServico->setor = $setor;
            $newServico->servico = $servico;
            if($newServico->save()){
                return json_encode(["save_with_success" => true]);    
            }
        } catch (\Throwable $th) {
            return json_encode(["save_with_success" => false]);
        }
    }
}
