<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EndpointTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->GET('/api');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
            ]);
    }

    use RefreshDatabase;

    public function testCreatePerson()
    {
        $response = $this->POST('/api', [
            'name' => 'John Doe',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'Person' => ['id', 'name'],
            ]);
    }

    public function testGetPersonByName()
    {
        $response = $this->GET('/api/John Doe');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'Person' => ['id', 'name'],
            ]);
    }

    public function testEditbyID()
    {
        $response = $this->POST('/api/2?_method=PUT', [
            'name' => 'Jane Doe',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'Person' => ['id', 'name'],
            ]);
    }

    public function testDeletebyID()
    {
        $response = $this->DELETE('/api/2');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message'
            ]);
    }
}
