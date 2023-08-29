<?php

namespace Tests\Feature;

use App\Models\Taref;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_funcao_index_retornar_array_com_sucesso()
    {
        Taref::factory()->count(5)->create();

        $response = $this->getJson('/api/tarefs/');

        $response
        ->assertStatus(500)
        ->assertJsonCount(5, 'data')
        ->assertJsonStructure(
            [
                'data' => [
                    '*' => ['id', 'descricao', 'created_at', 'updated_at']
                ]
            ]
        );
    }
}