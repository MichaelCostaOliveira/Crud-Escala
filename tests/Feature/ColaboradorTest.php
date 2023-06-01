<?php

namespace Tests\Feature;

use App\Models\Colaborador;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ColaboradorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Passport::actingAs(
            User::factory()->create(),
            ['app']
        );
    }
    public function test_search_colaborador()
    {
        $response = $this->get('/api/v1/colaborador');
        $response->assertStatus(200);
    }
    public function test_post_colaborador()
    {
        $colaborador = Colaborador::factory()->create();
        $response = $this->post('/api/v1/colaborador',$colaborador->toArray());
        $response->assertStatus(200);
    }

    public function test_get_colaborador()
    {
        $colaborador = Colaborador::factory()->create();
        $response = $this->get('/api/v1/colaborador/'.$colaborador->id);
        $response->assertStatus(200);
    }

    public function test_update_colaborador()
    {
        $colaborador = Colaborador::factory()->create();
        $response = $this->put('/api/v1/colaborador/'.$colaborador->id, Colaborador::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_delete_colaborador()
    {
        $colaborador = Colaborador::factory()->create();
        $response = $this->delete('/api/v1/colaborador/'.$colaborador->id);
        $response->assertStatus(200);
    }

    public function test_restore_colaborador()
    {
        $colaborador = Colaborador::factory()->create();
        $response = $this->delete('/api/v1/colaborador/'.$colaborador->id);
        $response->assertStatus(200);
        $response = $this->post('/api/v1/colaborador/restore/'.$colaborador->id);
        $response->assertStatus(200);
    }
}
