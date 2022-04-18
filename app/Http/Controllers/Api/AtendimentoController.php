<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atendimento as Atendimento;
use DB;

class AtendimentoController extends Controller
{
    public function index(){
        
        $atendimentos = Atendimento::all();
        return json_encode($atendimentos, JSON_PRETTY_PRINT);
    }
    /*
    public function __invoke(){ 
        $atendimentos = Atendimento::all();
        return json_encode($atendimentos, JSON_PRETTY_PRINT);}
    */
    public function get($id_atendimento){
        $atendimento = Atendimento::findOrFail($id_atendimento);
        return json_encode($atendimento, JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAtendimentoRequest $request){
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Atendimento $atendimento){
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendimento $atendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtendimentoRequest  $request
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atendimento $atendimento)
    {
        //
    }
}
