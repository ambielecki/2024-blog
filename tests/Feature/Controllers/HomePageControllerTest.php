<?php

namespace Feature\Controllers;

use Database\Seeders\PagesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_response() {
        $this->seed(PagesTableSeeder::class);

        $response = $this->get('/api/home/home');

        $response->assertStatus(200);
    }
}
