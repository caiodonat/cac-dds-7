<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_api(){
        $response = $this->get('/api/atendimentos');
        $response
        ->assertStatus(200);
    }

    public function test_resposta_banco(){
        $response = $this->getJson('/api/atendimentos');
 
        $response
            ->assertStatus(200)
            ->assertJson([
            ]);
    }

    public function test_create_atendimento(){
        $response = $this->getJson('/api/atendimento/id/1');
     
        $response
            ->assertJson(fn (AssertableJson $json) =>
               $json->where('id_atendimento', 1)
                ->where('sufixo_atendimento', 'FCR')
                ->etc()
            );
    }

    public function test_exibir_todos_os_atendimentos_em_uma_data_especifica(){
        $response = $this->getJson('/api/atendimentos/dia/2022-06-10');

        $response
            ->assertJson(fn (AssertableJson $json) =>
               $json->where('date_emissao_atendimento', '2022-06-10')
                ->etc()
            );
    }
}