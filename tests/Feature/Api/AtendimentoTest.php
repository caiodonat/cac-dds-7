<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Carbon\Carbon;

class AtendimentoTest extends TestCase
{
  private function firstDayDB()
  {
    $carbonNow = Carbon::now('-03:00');

    try {

      $fDay = DB::table('tb_atendimentos')
        ->where('id_atendimento', 1)
        ->value('date_emissao_atendimento');

      $fDayCrbon = Carbon::create($fDay);

      return $fDayCrbon;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function test_post()
  {
    $cpf = 11122233344;
    $servicos = 1;

    $r = $this->postJson(
      'api/atendimento/post/',
      ['cpf' => $cpf, 'servicos' => $servicos]
    );
    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->where('success', true)
        ->has('r', 1)
    );
    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r', 1)
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->first(
            fn ($json2) =>
            $json2->has('id_atendimento')
              ->where('cpf', $cpf)
              ->where('servicos', $servicos)
              ->etc()
          )
        )
    );
  }

  //retorna todos os atendimentos no DB
  public function test_all()
  {
    $r = $this->getJson('/api/atendimentos/all');
    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->where('success', true)
        ->has('r')
    );
  }

  //retorna um atendimento expecificado por ID
  public function test_id()
  {
    $response = $this->getJson('/api/atendimentos/id/1');

    $response
      ->assertJson(
        fn (AssertableJson $json) =>
        $json->where('success', true)
          ->has('r', 1) //verify if exist only 1 item in collection
          ->has(
            'r.0',
            fn ($json1) =>
            $json1->where('id_atendimento', 1)
              ->etc()
          )
      );
  }

  //retorna os atendimentos do dia atual
  public function test_day()
  {
    $day = $this->firstDayDB()->toDateString();

    $response = $this->getJson("/api/atendimentos/day/{$day}");

    $response
      ->assertJson(
        fn (AssertableJson $json) =>
        $json->where('success', true)
          ->has('r')
          ->first(
            fn ($json1) =>
            $json1->each(
              fn ($json2) =>
              $json2->has('id_atendimento')
                ->where('date_emissao_atendimento', $day)
                ->etc()
            )
          )
      );
  }

  //retorna os atendimentos realizados dentro de um espaço de tempo
  public function test_daysFirstLast()
  {
    $fDayDB = $this->firstDayDB();
    $fDay7 = Carbon::create($fDayDB)->addDays(7);

    $response = $this->getJson("/api/atendimentos/days/{$fDayDB->toDateString()}&{$fDay7->toDateString()}");

    $response
      ->assertJson(
        fn (AssertableJson $json) =>
        $json->where('success', true)
          ->has('r')
          ->first(
            fn ($json1) =>
            $json1->each(
              fn ($json2) =>
              $json2->has('id_atendimento')

                ->where('date_emissao_atendimento', (function (string $dt) {
                  $fDayDB = $this->firstDayDB();
                  $fDay7 = Carbon::create($fDayDB)->addDays(7);

                  return $dt >= $fDayDB->toDateString() &&
                    $dt <= $fDay7->toDateString();
                }))
                ->etc()
            )
          )
      );
  }

  //retorna os atendimentos realizados no mês
  public function test_monthMonth()
  {
    $fDayDB = $this->firstDayDB()->toDateString();

    $r = $this->getJson("/api/atendimentos/month/{$fDayDB}");

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->where('success', true)
        ->has('r')
        ->first(
          fn ($json1) =>
          $json1->each(
            fn ($json2) =>
            $json2->has('id_atendimento')

              ->where(
                'date_emissao_atendimento',
                (function (string $dt) {
                  $fDayDB = $this->firstDayDB();
                  $fDM = Carbon::create($fDayDB)->startOfMonth()->toDateString();
                  $lDM = Carbon::create($fDayDB)->endOfMonth()->toDateString();
                  return $dt >= $fDM &&
                    $dt <= $lDM;
                })
              )
              ->etc()
          )
        )
    );
  }

  public function test_queue()
  {
    $r = $this->getJson('api/atendimentos/queue');

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r')
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->each(
            fn ($json2) =>
            $json2->has('id_atendimento')

              ->where('date_emissao_atendimento', (function (string $dea) {
                $cNow = Carbon::now('-03:00')->toDateString();
                return $dea == $cNow;
              }))
              ->etc()
          )
        )
    );
  }

  public function test_queueNext()
  {
    $r = $this->getJson('api/atendimentos/queue/next');

    $cNow = Carbon::now('-03:00')->toDateString();

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r', 1)
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->first(
            fn ($json2) =>
            $json2->has('id_atendimento')
              ->where('date_emissao_atendimento', $cNow)
              ->etc()
          )
        )
    );
  }

  public function test_queueAlreadyCalled()
  {
    $r = $this->getJson('api/atendimentos/queue/already_called');

    $cNow = Carbon::now('-03:00')->toDateString();

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r')
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->first(
            fn ($json2) =>
            $json2->has('id_atendimento')
              ->where('date_emissao_atendimento', $cNow)
              ->where(
                'first_call',
                (function (string $fc) {

                  return $fc != null;
                })
              )
              ->etc()
          )
        )
    );
  }

  public function test_queueNumber()
  {
    $r = $this->getJson('api/atendimentos/queue/number/1');

    $cNow = Carbon::now('-03:00')->toDateString();

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r')
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->first(
            fn ($json2) =>
            $json2->has('id_atendimento')
              ->where('date_emissao_atendimento', $cNow)
              ->where('numero_atendimento', 1)
              ->etc()
          )
        )
    );
  }

  public function test_queueNextTo_call()
  {
    $r = $this->getJson('api/atendimentos/queue/next/to_call');

    $cNow = Carbon::now('-03:00')->toDateString();

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r')
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->first(
            fn ($json2) =>
            $json2->has('id_atendimento')
              ->where('date_emissao_atendimento', $cNow)
              ->where('status_atendimento', 'chamando')
              ->etc()
          )
        )
    );
  }


  //UPDATE

  public function test_begin()
  {
    $id_a = 1;
    $id_sD = 2;
    $r = $this->putJson(
      'api/atendimento/begin/',
      ['id_atendimento' => $id_a, 'id_service_desk' => $id_sD]
    );

    $cNow = Carbon::now('-03:00')->toDateTimeString();

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r')
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->first(
            fn ($json2) =>
            $json2->where('id_atendimento', $id_a)
              ->where('id_service_desk', $id_sD)
              ->where(
                'started',
                (function (string $id) {
                  $cNow = Carbon::now('-03:00');
                  $id_c = Carbon::create($id);
                  return 60 >= $cNow->diffInSeconds($id_c); //verifica com uma latencia maxima de 60 seg.
                })
              )
              ->etc()
          )
            ->etc()
        )
    );
  }

  public function test_finish()
  {
    $id_a = 1;
    $r = $this->putJson(
      'api/atendimento/finish/',
      ['id_atendimento' => $id_a, 'status_atendimento' => 'concluido']
    );

    $r->assertJson(
      fn (AssertableJson $json) =>
      $json->has('r')
        ->where('success', true)
        ->first(
          fn ($json1) =>
          $json1->first(
            fn ($json2) =>
            $json2->where('id_atendimento', $id_a)
              ->where(
                'finished',
                (function (string $id) {
                  $cNow = Carbon::now('-03:00');
                  $id_c = Carbon::create($id);
                  return 60 >= $cNow->diffInSeconds($id_c); //verifica com uma latencia maxima de 60 seg.
                })
              )
              ->etc()
          )
            ->etc()
        )
    );
  }
}
