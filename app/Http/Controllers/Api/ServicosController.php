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
        $servicos = Servicos::where("setor", "PDG")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
    public function getFCR()
    {
        $servicos = Servicos::where("setor", "FCR")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
    public function getSCT()
    {
        $servicos = Servicos::where("setor", "SCT")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
    public function getOTS()
    {
        $servicos = Servicos::where("setor", "OTS")
        ->get();

        return json_encode($servicos, JSON_PRETTY_PRINT);
    }
}
