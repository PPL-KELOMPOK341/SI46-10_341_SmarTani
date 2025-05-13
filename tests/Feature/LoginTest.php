<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Case 1: Login Berhasil dengan Akun Petani
     */
    public function test_login_berhasil_dengan_akun_petani()
    {
        \App\Models\User::factory()->create([
            'name' => 'Petani Cimaung',
            'email' => 'petanicimaung@gmail.com',
            'phone' => '081234567890', // ✅ phone wajib
            'password' => bcrypt('Petani543'),
        ]);

        $response = $this->post('/login', [
            'email' => 'petanicimaung@gmail.com',
            'password' => 'Petani543',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }

    /**
     * Test Case 2: Gagal Login karena Email Tidak Terdaftar
     */
    public function test_gagal_login_karena_email_tidak_terdaftar()
    {
        $response = $this->from('/login')->post('/login', [
            'email' => 'petaniiCimaungg@Gmail.com',
            'password' => 'Petani543',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test Case 3: Gagal Login karena Password Salah
     */
    public function test_gagal_login_karena_password_salah()
    {
        \App\Models\User::factory()->create([
            'name' => 'Petani Cimaung',
            'email' => 'petanicimaung@gmail.com',
            'phone' => '081234567891', // ✅ phone wajib dan beda dari yang lain
            'password' => bcrypt('Petani543'),
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'petaniCimaung@gmail.com',
            'password' => 'Cimaung156',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test Case 4: Field Kosong Saat Login
     */
    public function test_field_kosong_saat_login()
    {
        $response = $this->from('/login')->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email', 'password']);
        $this->assertGuest();
    }

    /**
     * Test Case 5: Format Email Tidak Valid
     */
    public function test_format_email_tidak_valid()
    {
        $response = $this->from('/login')->post('/login', [
            'email' => 'PetaniKUCimaung@@gmail.com', // Format salah
            'password' => 'tanicimaung67',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
