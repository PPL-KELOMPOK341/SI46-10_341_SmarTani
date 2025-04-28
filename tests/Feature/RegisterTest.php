<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Case 1: Registrasi dengan data lengkap
     */
    public function test_register_with_complete_data()
    {
        $response = $this->post('/register', [
            'name' => 'Petani Cimaung',
            'email' => 'petanicimaung@gmail.com',
            'phone' => '081234567890', // Menambahkan phone yang valid
            'password' => 'Petani543',
            'password_confirmation' => 'Petani543',
        ]);

        // Memastikan pengguna diarahkan ke halaman login setelah berhasil registrasi
        $response->assertRedirect('/login');
        
        // Memastikan user berhasil disimpan di database
        $this->assertDatabaseHas('users', [
            'email' => 'petanicimaung@gmail.com',
        ]);
    }

    /**
     * Test Case 2: Validasi email yang sudah terdaftar
     */
    public function test_register_with_duplicate_email()
    {
        // Registrasi pertama
        \App\Models\User::factory()->create([
            'email' => 'petanicimaung@gmail.com',
            'phone' => '081234567890', // Menambahkan phone yang valid
        ]);

        // Mencoba registrasi dengan email yang sama
        $response = $this->post('/register', [
            'name' => 'Petani Cimaung',
            'email' => 'petanicimaung@gmail.com', // Email yang sudah terdaftar
            'phone' => '081234567890',
            'password' => 'Petani543',
            'password_confirmation' => 'Petani543',
        ]);

        // Memastikan sistem mengembalikan error
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test Case 3: Enkripsi password
     */
    public function test_password_encryption()
    {
        $response = $this->post('/register', [
            'name' => 'Petani Cimaung',
            'email' => 'petanicimaung@gmail.com',
            'phone' => '081234567890', // Menambahkan phone yang valid
            'password' => 'Petani543',
            'password_confirmation' => 'Petani543',
        ]);

        // Memastikan user diarahkan ke halaman login setelah berhasil registrasi
        $response->assertRedirect('/login');

        // Memastikan password terenkripsi di database
        $user = \App\Models\User::where('email', 'petanicimaung@gmail.com')->first();
        $this->assertTrue(Hash::check('Petani543', $user->password)); // Verifikasi password terenkripsi
    }

    /**
     * Test Case 4: Validasi format email yang salah
     */
    public function test_register_with_invalid_email_format()
    {
        $response = $this->post('/register', [
            'name' => 'Petani Cimaung',
            'email' => 'PetaniKUCimaung@@gmail.com', // Format email salah
            'phone' => '081234567890', // Menambahkan phone yang valid
            'password' => 'Petani543',
            'password_confirmation' => 'Petani543',
        ]);

        // Memastikan sistem mengembalikan error untuk format email
        $response->assertSessionHasErrors('email');
    }
}
