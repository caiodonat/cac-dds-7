<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ServicosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pdg()
    {
        $r = $this->getJson('/api/servicos/pdg');

        $r->assertJson(fn (AssertableJson $json) =>
        $json->has('r')
        ->where('success', true)
        ->first(fn ($json1) =>
            $json1->each(fn ($json2) =>
                $json2->has('id_servicos')
                    ->has('servico')
                    ->where('setor', 'PDG')
                    ->etc()
                )
            )
        );
    }

    public function test_fcr()
    {
        $r = $this->getJson('api/servicos/fcr');

        $r->assertJson(fn (AssertableJson $json) =>
        $json->has('r')
        ->where('success', true)
        ->first(fn ($json1) =>
            $json1->each(fn($json3) =>
                $json3->has('id_servicos')
                    ->has('servico')
                    ->where('setor', 'FCR')
                    ->etc()
                )
            )
        );
    }

    public function test_sct()
    {
        $r = $this->getJson('api/servicos/sct');

        $r->assertJson(fn (AssertableJson $json) =>
        $json->has('r')
        ->where('success', true)
        ->first(fn ($json1) =>
            $json1->each(fn($json4) =>
                $json4->has('id_servicos')
                    ->has('servico')
                    ->where('setor', 'SCT')
                    ->etc()
                )
            )
        );
    }

    public function test_ots()
    {
        $r = $this->getJson('api/servicos/ots');

        $r->assertJson(fn (AssertableJson $json) =>
        $json->has('r')
        ->where('success', true)
        ->first(fn ($json1) =>
            $json1->each(fn($json5) =>
                $json5->has('id_servicos')
                    ->has('servico')
                    ->where('setor', 'OTS')
                    ->etc()
                )
            )
        );
    }
}
