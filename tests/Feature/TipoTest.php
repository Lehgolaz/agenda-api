<?php

namespace Tests\Feature;

use App\Models\Tipo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TipoTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     * A função index deve retornar 5 cadastros
     * @return void
     */
    public function test_funcao_index_retornar_array_com_sucesso()
    {
        //Criar paramentros
        $tipos = Tipo::factory()->count(5)->create();
        dd($tipos);
        //Processar
        //fazer uma chamada para  arota index no api
        //usar verbo GET
        $response = $this->getJson('/api/tipos');

        dd($response['data']);

        //Verificar resposta
        $response
            ->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => ['id', 'descricao' . 'created_at', 'update_at']
                    ]
                ]
            );
    }
}
