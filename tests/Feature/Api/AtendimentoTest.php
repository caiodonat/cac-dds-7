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
    private function firstDayDB(){
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

    //retorna todos os atendimentos no DB
    public function test_all(){
        $response = $this->getJson('/api/atendimentos/all');
        $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
            ->has('r')
     );
    }

    //retorna um atendimento expecificado por ID
    public function test_id(){
        $response = $this->getJson('/api/atendimentos/id/1');
 
        $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
            ->has('r', 1)//verify if exist only 1 item in collection
            ->has('r.0', fn ($json1) =>
                $json1->where('id_atendimento', 1)
                ->etc()
            )
        );
    }

    //retorna os atendimentos do dia atual
    public function test_day(){
        $day = $this->firstDayDB()->toDateString();

        $response = $this->getJson("/api/atendimentos/day/{$day}");
     
        $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
            ->has('r')
            ->first(fn ($json1) =>
                $json1->each(fn ($json2) =>
                    $json2->has('id_atendimento')
                    ->where('date_emissao_atendimento', $day)
                    ->etc()
                )
            )
        );
    }

    //retorna os atendimentos realizados dentro de um espaço de tempo
    public function test_daysFirstLast(){
        $fDayDB = $this->firstDayDB();
        $fDay7 = Carbon::create($fDayDB)->addDays(7);
        
        $response = $this->getJson("/api/atendimentos/days/{$fDayDB->toDateString()}&{$fDay7->toDateString()}");

        $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
            ->has('r')
            ->first(fn ($json1) =>
                $json1->each(fn ($json2) =>
                    $json2->has('id_atendimento')

                    ->where('date_emissao_atendimento', (function (string $dt){
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
    public function test_monthMonth(){
        $fDayDB = $this->firstDayDB()->toDateString();
        
        $r = $this->getJson("/api/atendimentos/month/{$fDayDB}");

        $r->assertJson(fn (AssertableJson $json) =>
        $json->where('success', true)
        ->has('r')
        ->first(fn ($json1) =>
            $json1->each(fn ($json2) =>
                $json2->has('id_atendimento')

                    ->where('date_emissao_atendimento',
                        (function (string $dt){
                            $fDayDB = $this->firstDayDB();
                            $fDM = Carbon::create($fDayDB)->startOfMonth()->toDateString();
                            $lDM = Carbon::create($fDayDB)->endOfMonth()->toDateString();
                            return $dt >= $fDM && 
                        $dt <= $lDM;
                    }))
                    ->etc()
                )
            )
        );
    }

    public function test_queue(){
        $r = $this->getJson('api/atendimentos/queue');

        $r->assertJson(fn (AssertableJson $json) =>
        $json->has('r')
        ->where('success', true)
        ->first(fn ($json1) =>
            $json1->each(fn ($json2) =>
                $json2->has('id_atendimento')

                    ->where('date_emissao_atendimento', (function (string $dea){
                        $cNow = Carbon::now('-03:00')->toDateString();
                        return $dea == $cNow;

                    }))
                    ->etc()
                )
        )
        );
    }

    public function test_queueNext(){
        $r = $this->getJson('api/atendimentos/queue/next');

        $cNow = Carbon::now('-03:00')->toDateString();

        $r->assertJson(fn (AssertableJson $json) =>
            $json->has('r', 1)
            ->where('success', true)
            ->first(fn ($json1) =>
                $json1->first(fn ($json2) =>
                    $json2->has('id_atendimento')
                    ->where('date_emissao_atendimento', $cNow)
                    ->etc()
                )
            )
        );
    }

    public function test_queueAlreadyCalled(){
        $r = $this->getJson('api/atendimentos/queue/already_called');

        $cNow = Carbon::now('-03:00')->toDateString();

        $r->assertJson(fn (AssertableJson $json) =>
            $json->has('r')
            ->where('success', true)
            ->first(fn ($json1) =>
                $json1->first(fn ($json2) =>
                    $json2->has('id_atendimento')
                    ->where('date_emissao_atendimento', $cNow)
                    ->where('first_call',
                        (function (string $fc){

                            return $fc != null;
                        })
                    )
                    ->etc()
                )
            )
        );
    }

    public function test_queueNumber(){
        $r = $this->getJson('api/atendimentos/queue/number/1');

        $cNow = Carbon::now('-03:00')->toDateString();

        $r->assertJson(fn (AssertableJson $json) =>
        $json->has('r')
        ->where('success', true)
        ->first(fn ($json1) =>
            $json1->first(fn ($json2) =>
                $json2->has('id_atendimento')
                    ->where('date_emissao_atendimento', $cNow)
                    ->where('numero_atendimento', 1)
                    ->etc()
                )
            )
        );
    }

    public function test_queueNextTo_call(){
        $r = $this->getJson('api/atendimentos/queue/next/to_call');

        $cNow = Carbon::now('-03:00')->toDateString();

        $r->assertJson(fn (AssertableJson $json) =>
        $json->has('r')
        ->where('success', true)
        ->first(fn ($json1) =>
            $json1->first(fn ($json2) =>
                $json2->has('id_atendimento')
                    ->where('date_emissao_atendimento', $cNow)
                    ->where('status_atendimento', 'chamando')
                    ->etc()
                )
            )
        );
    }

    public function test_chamar_senha_no_telao_e_alterar_o_valor_do_staus_do_atendimetno(){
        $response = $this->getJson('api/atendimento/to_call_next');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
               $json->where('ToCallNext')
                ->etc()
                )
            );
    }
    
    public function test_iniciar_atendimento(){
        $response = $this->putJson('api/atendimento/begin/{id_atendimento}');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
                $json->where('atendimentoBegin')
                ->etc()
                )
            );
    }

    public function test_encerrar_atendimento(){
        $response = $this->putJson('api/atendimento/finish/{id_atendimento}&{$estado_fim_atendimento}');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
                $json->where('atendimentoFinish')
                ->etc()
                )
            );
    }
}