<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guiches;
use App\Models\login_guiches;
use Illuminate\Support\Facades\Redis;

class ApiGuiches extends Controller
{
    public function funcionariosAll()
    {
        //todos os funcionarios ativos/desativados
        $funcionarios = login_guiches::where('login')->get();
        if (count($funcionarios) > 0) {
            return response()->json($funcionarios, 201);
        } else {
            return response()->json(['message' => 'Funcionario não encontrado'], 404);
        }
    }

    public function createFuncionario(Request $request)
    {
        //Criar cadastro do funcionarios no sistema
        $funcionarios = login_guiches::created($request->all());
        if ($funcionarios) {
            return response()->json($funcionarios, 201);
        } else {
            return response()->json(['message' => 'Funcionario não criado']);
        }
    }

    public function idFuncionarios($nome_funcionario)
    {
        //busca pelo nome
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
