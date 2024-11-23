<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /*
        Unit test para crear 5 registros, obtener registros del endpoint /api/urls
        verificar que el codigo del response sea 200 y que la estructura del json sea correcta
    */
    public function test_index_returns_urls()
    {
        Url::factory()->count(5)->create();

        $response = $this->getJson('/api/urls');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'url',
                    'short_url',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /*
        Unit test para crear un registro y verificar que el codigo 
        y estructura del json sea correcta
    */
    public function test_create_url()
    {
        $url = 'https://spot2.mx';

        $response = $this->postJson('/api/urls', [
            'url' => $url,
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'url',
                'short_url',
                'created_at',
                'updated_at',
            ]);

        $this->assertDatabaseHas('urls', ['url' => $url]);
    }

    /*
        Unit test para crear un registro, enviar una peticion al endpoint de eliminar
        y verificar que el codigo del response sea 204 y que el registro haya sido eliminado
        posteriormente
    */
    public function test_delete_url()
    {
        $url = Url::factory()->create();

        $response = $this->deleteJson("/api/urls?id=".$url->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('urls', ['id' => $url->id]);
    }
}
