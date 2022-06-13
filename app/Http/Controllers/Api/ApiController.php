<?php

namespace App\Http\Controllers\Api;

namespace Illuminate\Database\Eloquent\Builder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoginGuiche;

class ApiController extends Controller
{
    public function AllFuncionarios()
    {
        //Buscar por todos os funcionarios
        $DadosFuncionarios = LoginGuiche::all();
        if (count($DadosFuncionarios) > 0) {
            return response()->json($DadosFuncionarios);
        } else {
            return response()->json(['message' => 'Funcionarios não existentes', 404]);
        }
    }

    public function createfuncionarios(Request $request)
    {
        //Criação de funcionarios
    }

    public function buscarfuncionarios($id)
    {
        //Buscar por funcionario especifico
    }

    public function Attfuncionarios(Request $request, $id)
    {
        //Atualizar dados do funcionarios funcionarios
    }

    public function deletfuncionarios()
    {
        //deletar dados de funcionarios
    }
}
