<?php

namespace Tests\Feature;

use App\Models\Taref;
use App\Models\Tipo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
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
        ->assertStatus(200)
        ->assertJsonCount(5, 'data')
        ->assertJsonStructure(
            [
                'data' => [
                    '*' => ['id', 'data', 'assunto', 'descricao', 'contato', 'tipo_id', 'created_at', 'updated_at']
                ]
            ]
        );
    }

     /**
     * Deve cadastrar um novo registro com sucesso
     * @return void
     */
    public function test_criar_um_novo_taref_com_sucesso()
    {
        //Criar Tipo
        $id = Tipo::factory()->create()->id;
        //Criar dados
        $data = [
            'data' => $this->faker->date(),
            'assunto' => $this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'contato' => $this->faker->name(),
            'tipo_id' => $id
                
        ];
        //Processar
        $response = $this->postJson('/api/tarefs/', $data);
        //Avaliar a saida
        $response->assertStatus(201)
            ->assertJsonStructure([
                'id', 'descricao', 'created_at',
                'updated_at'
            ]);
    }
     /**
     * Deve cadastrar um novo registro com falha
     * @return void
     */
    public function test_criar_um_novo_taref_com_falha()
    {
        //Criar dados
        $data = [
            'data' => "",
            'assunto' =>"",
            'descricao' => "",
            'contato' => "",
            'tipo_id' =>""
        ];
        //Processar
        $response = $this->postJson('/api/tarefs/', $data);
        //Avaliar a saida
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['descricao']);
    }
    /**
     * Buscar um id no servidor com sucesso!
     * @return void
     */
    public function test_buscar_id_no_banco_com_sucesso()
    {
        //Criar dados
        $tipo = Tipo::factory()->create();
        //processar
        $response = $this->getJson('/api/tipos/' . $tipo->id);
        //verificar saida
        $response->assertStatus(200)
            ->assertJson([
                'id' => $tipo->id,
                'descricao' => $tipo->descricao,
            ]);
    }
}