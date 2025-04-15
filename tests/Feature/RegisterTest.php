<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register_with_valid_data()
    {
        $response = $this->post('/register', [
            'name' => 'Toni',
            'email' => 'toni@gmail.com',
            'phone' => '081234567890',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/login'); // redirect ke login setelah register sukses?
        $this->assertDatabaseHas('users', ['email' => 'toni@gmail.com']);
    }

    /** @test */
    public function registration_fails_with_invalid_data()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'invalid-email',
            'phone' => '',
            'password' => 'short',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password', 'phone']);
    }
}
