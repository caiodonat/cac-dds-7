<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guiches;
use App\Models\LoginGuiche;
use Illuminate\Support\Facades\Redis;

class ApiGuiches extends Controller
{
    public function getfuncionarios()
    {
        $funcionarios = LoginGuiche::all();
        if ($funcionarios->count() > 1) {
            return response()->json($funcionarios);
        } else {
            return response()->json(['message' => 'Nenhum funcionario encontrado'], 404);
        }
    }
    public function postfuncionario(Request $request)
    {
        //Criar cadastro do funcionarios no sistema

    }

    public function idFuncionarios($id)
    {
        /*
        $funcionarios = LoginGuiche::find($id);
        if (!$funcionarios) {
            return response()->json(['error' => 'Funcionario não encontrado']);
        }
        */
    }

    public function atualizarFuncionarios(Request $request, $nome_funcionario)
    {
        //Atualiza os dados do funcionario
    }

    public function deletFuncionario($nome_funcionario)
    {
        //exlcui dados dos funcionarios do sistema
    }
}
