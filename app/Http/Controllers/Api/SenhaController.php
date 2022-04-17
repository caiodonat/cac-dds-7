<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreSenhaRequest;
use App\Http\Requests\UpdateSenhaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Senha as Senha;
use DB;

class SenhaController extends Controller
{
    public function index(){

        //$senhas_b = Senha::all();

        $senhas = [1=>"Volvo", 2=>"BMW", 3=>"Toyota"];
        return json_encode($senhas, JSON_PRETTY_PRINT);
    }
    
    public function create()
    {
        //
    }

    public function store(StoreRoomRequest $request)
    {
        //
    }

    public function show(Room $room)
    {
        //
    }
    
    public function edit(Room $room)
    {
        //
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        //
    }
}
