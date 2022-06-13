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
        $response = $this->get('/atendimentos');
        $response->assertStatus(200);
    }

    public function test_atendimentos(){
        $response = $this->getJson('/api/atendimentos');
 
        $response->assertJson(fn (AssertableJson $json) =>
        $json//->has(2)
            ->first(fn ($json) =>
                $json->where('id_atendimento', 1)
                ->etc()
            )
        )
    ;
    }

    public function test_id(){
        $response = $this->getJson('/api/atendimento/id/1');
     
        $response->assertJson(fn (AssertableJson $json) =>
               $json->where('id_atendimento', 1)
                ->etc()
        );
    }

    public function test_date(){
        $response = $this->getJson('/api/atendimentos/dia/2022-06-10');

        $response->assertJson(fn (AssertableJson $json) =>
               $json->where('date_emissao_atendimento', '2022-06-10')
                ->etc()
            );
    }
    public function test_date_from_to(){
        $response = $this->getJson('/api/atendimentos/dia/2022-06-10');

        $response->assertJson(fn (AssertableJson $json) =>
               $json->where('date_emissao_atendimento', '2022-06-10')
                ->etc()
            );
    }
}