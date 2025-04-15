<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $user = User::create([
            'name' => 'Toni',
            'email' => 'toni@gmail.com',
            'phone' => '081234567890',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'toni@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_login_with_invalid_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'invalidpassword',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }
}
