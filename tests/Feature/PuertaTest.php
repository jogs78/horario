<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PuertaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_entrar(): void
    {
        $response = $this->get('entrar');
        $response->assertStatus(200);
    }

    public function test_salir(): void
    {
        $response = $this->get('salir');
        $response->assertStatus(302);
    }
}
