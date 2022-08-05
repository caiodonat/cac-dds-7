<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Atendimento as Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Symfony\Component\HttpKernel\Event\RequestEvent;

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

      if ($newA->id_servicos = $rt->input('id_servicos')) {
        $newA->sufixo_atendimento = DB::table('tb_servicos')
          ->where('id_servicos', $rt->input('id_servicos'))
          ->value('setor');

        $newA->servico = DB::table('tb_servicos')
        ->where('id_servicos', $rt->input('id_servicos'))
        ->value('servico');
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
        //->reverse();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function queueNextAlready_called()//gonna disappear
  {
    try {
      $cNow = Carbon::now('-03:00')->toDateString();

      $r = DB::table('tb_atendimentos')
        ->where("date_emissao_atendimento", $cNow)
        ->whereNotNull("first_call")
        ->get()->last();

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
          'user_desk' => $rt->input('user_desk'),
          'status_atendimento' => 'em_atendimento'
        ]);

      $r = DB::table('tb_atendimentos')
        ->where('id_atendimento', $rt->input('id_atendimento'))
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function finish(Request $rt)
  {
    try {
      //echo $rt;
      $cNow = Carbon::now('-03:00');

      DB::table('tb_atendimentos')
        ->where('id_atendimento', $rt->input('id_atendimento'))
        ->update([
          'finished' => $cNow->toDateTimeString(),
          'status_atendimento' => $rt->input('status_atendimento')
        ]);

      $r = DB::table('tb_atendimentos')
        ->where('id_atendimento', $rt->input('id_atendimento'))
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function call(Request $rt)
  {
    //adiciona esse atendimento ($id_atendimento) a uma lista que sera chamada pelo telão, e o telao ficarar verificando (com frequencia) se possui atualizações nessa fila

    try {
      $cNow = Carbon::now('-03:00');

      DB::table('tb_atendimentos')
        ->where('id_atendimento', $rt->input('id_atendimento'))
        ->update([
          'first_call' => $cNow->toDateTimeString(),
          'user_desk' => $rt->input('user_desk'),
          'status_atendimento' => 'chamando'
        ]);

      $r = DB::table('tb_atendimentos')
        ->where('id_atendimento', $rt->input('id_atendimento'))
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }

  public function queue_callNext(Request $rt)
  {
    //guiche nao pode utilizar essa rota se ele estiver em atendimento
    //adiciona esse atendimento ($id_atendimento) a uma lista que sera chamada pelo telão, e o telao ficarar verificando (com frequencia) se possui atualizações nessa fila
    //2 guiches nao podem chamar a mesma senha

    try {
      $cNow = Carbon::now('-03:00');

      $atm = DB::table('tb_atendimentos')
        ->where('date_emissao_atendimento', '=', $cNow->toDateString())
        ->where('status_atendimento', null)
        ->first();

        DB::table('tb_atendimentos')
        ->where('id_atendimento', $atm->id_atendimento)
        ->update([
          'status_atendimento' => 'chamando',
          'user_desk' => $rt->input('user_desk'),
          'first_call' => $cNow->toDateTimeString()
        ]);

      $r = DB::table('tb_atendimentos')
        ->where('id_atendimento', $atm->id_atendimento)
        ->get();

      return json_encode(['r' => $r, 'success' => true], JSON_PRETTY_PRINT);
    } catch (\Throwable $th) {
      return json_encode(['r' => $th, 'success' => false], JSON_PRETTY_PRINT);
    }
  }
}
