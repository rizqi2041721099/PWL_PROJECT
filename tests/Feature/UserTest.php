<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $response = $this->get('/users/create');

        $response->assertStatus(500);
    }
    public function testReadUser()
    {
        $response = $this->get('/users');

        $response->assertStatus(500);
    }
    public function testUpdateUser()
    {
        $response = $this->get('/users/{id}/edit');

        $response->assertStatus(500);
    }
    public function testDeleteUser()
    {
        $response = $this->get('/users/delete');

        $response->assertStatus(200);
    }
}
