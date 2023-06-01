<?php

namespace Tests\Feature;

use App\Models\Colaborador;
use App\Models\EscalaTrabalho;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class EscalaTrabalhoTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Passport::actingAs(
            User::factory()->create(),
            ['app']
        );
    }
    public function test_search_escala_trabalho()
    {
        $response = $this->get('/api/v1/escala-trabalho');
        $response->assertStatus(200);
    }
    public function test_post_escala_trabalho()
    {
        $escalaTrabalho = EscalaTrabalho::factory()->create();
        $response = $this->post('/api/v1/escala-trabalho',$escalaTrabalho->toArray());
        $response->assertStatus(200);
    }

    public function test_get_escala_trabalho()
    {
        $escalaTrabalho = EscalaTrabalho::factory()->create();
        $response = $this->get('/api/v1/escala-trabalho/'.$escalaTrabalho->id);
        $response->assertStatus(200);
    }

    public function test_update_escala_trabalho()
    {
        $escalaTrabalho = EscalaTrabalho::factory()->create();
        $response = $this->put('/api/v1/escala-trabalho/'.$escalaTrabalho->id, EscalaTrabalho::factory()->make()->toArray());
        $response->assertStatus(200);
    }

    public function test_delete_escala_trabalho()
    {
        $escalaTrabalho = EscalaTrabalho::factory()->create();
        $response = $this->delete('/api/v1/escala-trabalho/'.$escalaTrabalho->id);
        $response->assertStatus(200);
    }

    public function test_restore_escala_trabalho()
    {
        $escalaTrabalho = EscalaTrabalho::factory()->create();
        $response = $this->delete('/api/v1/escala-trabalho/'.$escalaTrabalho->id);
        $response->assertStatus(200);
        $response = $this->post('/api/v1/escala-trabalho/restore/'.$escalaTrabalho->id);
        $response->assertStatus(200);
    }
}
