<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiTest extends TestCase
{
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
        $response = $this->getJson('/api/atendimentos');
 
        $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('success', true)
            ->has('r')
        );
    }
/*

    public function test_create_atendimento(){
        $response = $this->getJson('/api/atendimento/id/1');
     
        $response
            ->assertJson(fn (AssertableJson $json) =>
               $json->where('id_atendimento', 1)
                ->etc()
            );
    }

    public function test_exibir_todos_os_atendimentos_em_uma_data_especifica(){
        $response = $this->getJson('/api/atendimentos/dia/2022-06-20');

        $response
            ->assertJson(fn (AssertableJson $json) =>
               $json->where('date_emissao_atendimento', '2022-06-20')//tem que add forEach
                ->etc()
        );
    }

    public function test_exibir_todos_os_atendimentos_dentro_de_um_periodo_de_tempo(){
        $response = $this->getJson('/api/atendimentos/dias/2022-06-15&2022-06-20');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
               $json->where("date_emissao_atendimento")
                ->etc()
                )
            );
    }

    public function test_exibir_todos_os_atendimentos_dentro_de_um_mes_especifico(){
        $response = $this->getJson('api/atendimentos/month/6');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
                $json->where("date_emissao_atendimento", '2022-06-01 , 2022-06-30')
                ->etc()
            )
        );
    }

    public function test_exibir_proximos_atendimentos(){
        $response = $this->getJson('api/atendimentos/');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
               $json->where("atendimentosQueueToday")
                ->etc()
            )
        );
    }

    public function test_chamar_proximo_da_fila(){
        $response = $this->getJson('api//atendimento/');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
               $json->where('atendimentosQueueTodayNext')
                ->etc()
                )
            );
    }

    public function test_chamar_novamente_senha_que_nao_compareceu(){
        $response = $this->getJson('api/atendimentos/');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
               $json->where('atendimentosAfterQueueToday')
                ->etc()
                )
            );
    }

    public function test_exibir_um_atendimento_especifico_do_dia_pelo_numero_atendimento(){
        $response = $this->getJson('api/atendimento/numero_atendimento/');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
               $json->where('atendimentoTodayNumber')
                ->etc()
                )
            );
    }

    public function test_senhas_a_serem_atendidas(){
        $response = $this->getJson('api/atendimento/to_call');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->first(fn ($json) =>
               $json->where('ToCallNext')
                ->etc()
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
    */
}