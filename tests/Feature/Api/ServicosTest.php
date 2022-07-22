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
}
