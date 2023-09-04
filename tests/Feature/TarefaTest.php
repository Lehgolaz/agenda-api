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
        $taref = Taref::factory()->create();
        //processar
        $response = $this->getJson('/api/tarefs/' . $taref->id);
        //verificar saida
        $response->assertStatus(200)
            ->assertJson([
                'id' => $taref->id,
                'descricao' => $taref->descricao,
            ]);
    }
     /**
     * Deve dar erro ao tentar pesquisar um cadastro inexistente
     * @return void
     */
    public function test_buscar_id_no_banco_com_falha()
    {
        //processar
        $response = $this->getJson('api/tarefs/99999999');
        //verificar saida
        $response->assertStatus(404)
            ->assertJson([
                'message' => "Tarefa não encontrada!"
            ]);
    }
     /**
     * Teste de atualizacao com sucesso
     * @return void
     */

     public function test_atualizar_taref_com_sucesso()
     {
         //Criar dados
         $taref = Taref::factory()->create();
         $new = [
            'data' => $this->faker->date(),
            'assunto' => $this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'contato' => $this->faker->name(),
            'tipo_id' => Tipo::factory()->create()->id
         ];
         //Processar
         $response = $this->putJson('/api/tarefs/' . $taref->id, $new);
         //Analisar
         // Verifique a resposta
         $response->assertStatus(200)
             ->assertJson([
                'id' => $taref->id,
                'data' => $new['data'] ,
                'assunto' => $new['assunto'],
                'descricao' => $new['descricao'] ,
                'contato' => $new['contato'],
                'tipo_id' => $new['tipo_id'],
             ]);
     }
      /**
     * Teste de atualizacao com falha de tipo inexistente
     * @return void
     */

    public function test_atualizar_taref_inexistente_com_falha()
    {
        //Criar dados
        $taref = Taref::factory()->create();

        $new = [
            'data' => $this->faker->date(),
            'assunto' => $this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'contato' => $this->faker->name(),
            'tipo_id' => Tipo::factory()->create()->id
        ];
        //Processar
        $response = $this->putJson('/api/tarefs/999999', $new);
        //Analisar
        // Verifique a resposta
        $response->assertStatus(404)
            ->assertJson([
                'message' => "Tarefa não encontrada!"
            ]);
    }
     /**
     * Teste de atualizacao com falha nos dados
     * @return void
     */
    public function test_atualizar_taref_com_falha_nos_dados()
    {
        //Criar dados
        $taref = Taref::factory()->create();
        $new = [
            'descricao' => ''
        ];
        //Processar
        $response = $this->putJson('/api/tarefs/' . $taref->id, $new);
        //Analisar
        // Verifique a resposta
        //Avaliar a saida
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['descricao']);
    }
     /**
     * Deve deletar com sucesso um registro do banco
     */
    public function test_deletar_taref_com_sucesso(){
        //Criar o tipo
        $taref = Taref::factory()->create();

        //Processar
        $response = $this->deleteJson('/api/tarefs/'.$taref->id);
        //Analisar
        // Verifique a resposta
        $response->assertStatus(200)
            ->assertJson([
                'message' => "Tarefa deletada com sucesso!"
            ]);
    }
     /**
     * Deve dar erro ao deletar um registro inexistente
     */
    public function test_deletar_taref_com_falha(){

        //Processar
        $response = $this->deleteJson('/api/tarefs/999999');
        //Analisar
        // Verifique a resposta
        $response->assertStatus(404)
            ->assertJson([
                'message' => "Tarefa não encontrada!"
            ]);
    }
   
}