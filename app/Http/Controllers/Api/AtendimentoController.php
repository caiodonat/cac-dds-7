<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atendimento as Atendimento;
use DB;
use Carbon\Carbon;

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
        
        try{
            $cpf = $request->input("cpf");
            $numero_atendimento = $request->input("numero_atendimento");
            $sufixo_atendimento = $request->input("sufixo_atendimento");
            $data_atendimento = $request->input("data_atendimento");
            $emissao_atendimento = $request->input("emissao_atendimento");

            
            $atendimento = new Atendimento();
            $atendimento->cpf = $cpf;
            $atendimento->numero_atendimento = $numero_atendimento;
            $atendimento->sufixo_atendimento = $sufixo_atendimento;
            $atendimento->data_atendimento = $data_atendimento;
            $atendimento->emissao_atendimento = Carbon::now();

            if ($atendimento->save()){
                return json_encode($atendimento);
            }
            return json_encode(["erro"=>true]);
        }catch(\Exception $e){

            return json_encode(["erro"=>true,"message"=>$e->getMessage()]);

        }
    }

    public function atendimentoHoje(){
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
