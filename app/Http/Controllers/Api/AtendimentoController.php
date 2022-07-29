<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Atendimento as Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AtendimentoController extends Controller
{
  //POST

  public function post(Request $rt)
  {
    try {
      //now use fetch body's
      $cNow = Carbon::now('-03:00');
      $newA = new Atendimento();

      //$newA->id_atendimento = $rt->input('id_atendimento');//not possible

      if ($newA->date_time_emissao_atendimento = $rt->input('date_time_emissao_atendimento')) {
        $newA->date_emissao_atendimento = Carbon::create($rt->input('date_time_emissao_atendimento'))->toDateString();
      } else {
        $newA->date_time_emissao_atendimento = $cNow;
        $newA->date_emissao_atendimento = $cNow->toDateString();
      }

      $newA->cpf = $rt->input('cpf');

      if (!$newA->numero_atendimento = $rt->input('numero_atendimento')) {
        try {
          $lA = DB::table('tb_atendimentos')
            ->where("date_emissao_atendimento", $cNow->toDateString())
            ->get()->last();

          $newA->numero_atendimento = $lA->numero_atendimento + 1;
        } catch (\Throwable) {
          $newA->numero_atendimento = 1;
        }
      }

      if ($newA->servicos = $rt->input('servicos')) {
        $newA->sufixo_atendimento = DB::table('tb_servicos')
          ->where('id_servicos', $rt->input('servicos'))
          ->value('setor');
      } else {
        $newA->sufixo_atendimento = "OTS";
      }

      $newA->save();

      $r = DB::table('tb_atendimentos')
        ->where('id_atendimento', $newA->id_atendimento)
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  //GET

  public function all()
  {
    try {
      $r = DB::table('tb_atendimentos')
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function id($id_atendimento)
  {
    try {
      $r = DB::table('tb_atendimentos')
        ->where('id_atendimento', $id_atendimento)
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function day($date)
  {
    try {
      $dateRequest = Carbon::create($date)->toDateString();

      $r = DB::table('tb_atendimentos')
        ->where("date_emissao_atendimento", $dateRequest)
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function daysFirstLast($first, $last)
  {
    try {
      $f = Carbon::create($first)->toDateString();
      $l = Carbon::create($last)->toDateString();

      $r = DB::table('tb_atendimentos')
        ->whereBetween('date_emissao_atendimento', [$f, $l])
        ->get();


      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function monthMonth($month)
  {
    try {
      $f = Carbon::create($month)->startOfMonth()->toDateString();
      $l = Carbon::create($month)->endOfMonth()->toDateString();

      $r = $this->daysFirstLast($f, $l);

      return $r;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function queue()
  {
    try {
      $cNow = Carbon::now('-03:00')->toDateString();

      $r = DB::table('tb_atendimentos')
        ->where('date_emissao_atendimento', $cNow)
        ->where("started", null)
        ->get();
      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function queueNext()
  {
    try {
      $cNow = Carbon::now('-03:00')->toDateString();

      $r = DB::table('tb_atendimentos')
        ->where('date_emissao_atendimento', $cNow)
        ->where("started", null)
        ->get()->first();


      return json_encode(['r' => [$r], 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function queueAlready_called()
  {
    try {
      $cNow = Carbon::now('-03:00')->toDateString();

      $r = DB::table('tb_atendimentos')
        ->where("date_emissao_atendimento", $cNow)
        ->whereNotNull("first_call")
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function queueNumber($numero_atendimento)
  {
    try {
      $cNow = Carbon::now('-03:00')->toDateString();

      $r = DB::table('tb_atendimentos')
        ->where("date_emissao_atendimento", $cNow)
        ->where("numero_atendimento", $numero_atendimento)
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function queueNextTo_call()
  {
    try {
      $cNow = Carbon::now('-03:00')->toDateString();

      $r = DB::table('tb_atendimentos')
        ->where("date_emissao_atendimento", $cNow)
        ->where('status_atendimento', 'chamando')
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }


  //UPDATE

  public function begin(Request $rt)
  {
    try {
      //echo $rt;
      $cNow = Carbon::now('-03:00');

      DB::table('tb_atendimentos')
        ->where('id_atendimento', $rt->input('id_atendimento'))
        ->update([
          'started' => $cNow->toDateTimeString(),
          'id_service_desk' => $rt->input('id_service_desk')
        ]);

      $r = DB::table('tb_atendimentos')
        ->where('id_atendimento', $rt->input('id_atendimento'))
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function atendimentoFinish($id_atendimento, $estado_fim_atendimento)
  {
    $carbonNow = Carbon::now('-03:00');
    Atendimento::where("id_atendimento", "=", $id_atendimento)
      ->update(['fim_atendimento' => $carbonNow
        ->toDateTimeString()])
      ->update(['estado_fim_atendimento' => $estado_fim_atendimento]);

    $atendimento = Atendimento::findOrFail($id_atendimento);

    return json_encode($atendimento, JSON_PRETTY_PRINT);
  }

  public function call($id_atendimento)
  {
    //adiciona esse atendimento ($id_atendimento) a uma lista que sera chamada pelo telão, e o telao ficarar verificando (com frequencia) se possui atualizações nessa fila

    $carbonNow = Carbon::now('-03:00');

    DB::table('tb_atendimentos')
      ->where('id_atendimento', '=', $id_atendimento)
      ->update([
        'status_atendimento' => 'chamando',
        'first_call' => $carbonNow->toDateTimeString()
      ]);

    $atendimento = Atendimento::findOrFail($id_atendimento);

    return json_encode($atendimento, JSON_PRETTY_PRINT);
  }

  public function callNext()
  {
    //guiche nao pode utilizar essa rota se ele estiver em atendimento
    //adiciona esse atendimento ($id_atendimento) a uma lista que sera chamada pelo telão, e o telao ficarar verificando (com frequencia) se possui atualizações nessa fila
    //2 guiches nao podem chamar a mesma senha

    $carbonNow = Carbon::now('-03:00');

    try {
      $id_atendimento = DB::table('tb_atendimentos')
        ->where('date_emissao_atendimento', '=', $carbonNow->toDateString())
        ->value('id_atendimento');

      DB::table('tb_atendimentos')
        ->where('id_atendimento', $id_atendimento)
        ->update([
          'status_atendimento' => 'chamando',
          'first_call' => $carbonNow->toDateTimeString()
        ]);

      $atendimento = Atendimento::findOrFail($id_atendimento);

      return json_encode($atendimento, JSON_PRETTY_PRINT);
    } catch (\Exception $th) {
      return json_encode(["fila_vazia" => true]);
    }
  }

  public function toCallNext()
  {   /*
        *   metodo utilizado pelo telao para verificar qual senha deve ser chamada
        */

    $carbonNow = Carbon::now('-03:00');

    $id_atendimento = Atendimento::where("date_emissao_atendimento", $carbonNow
      ->toDateString())
      ->where("inicio_atendimento", "=", null)
      ->get()->first()->value('id_atendimento');

    $atendimento = Atendimento::where('date_emissao_atendimento', $carbonNow->toDateString())
      ->where('status_atendimento', "=", 'chamando')
      ->get()->first();
    if ($atendimento != null) {
      Atendimento::where("id_atendimento", "=", $atendimento->id_atendimento)
        ->update(['status_atendimento' => 'aguardando']);

      try {
        $id_atendimento_next = DB::table('tb_atendimentos')
          ->where('date_emissao_atendimento', $carbonNow->toDateString())
          ->where('status_atendimento', 'chamando')
          ->value('id_atendimento');

        $atendimento = Atendimento::findOrFail($id_atendimento_next);

        $atendimento->status_atendimento = "aguardando";

        if ($atendimento->save()) {
          return json_encode($atendimento, JSON_PRETTY_PRINT);
        }
      } catch (\Exception $e) {
        return json_encode(["fila_vazia" => true]);
      }
    }
  }
}
