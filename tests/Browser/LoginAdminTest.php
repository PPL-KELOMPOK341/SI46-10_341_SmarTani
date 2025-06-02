<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginAdminTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_admin_can_login_with_correct_credentials()
    {
        // Membuat user admin dummy
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login') // Sesuaikan jika route berbeda
                    ->assertSee('Login Admin SmarTani')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password123')
                    ->press('Login')
                    ->assertPathIs('/dashboard'); // Ganti sesuai halaman redirect setelah login
        });
    }

    public function test_login_fails_with_wrong_password()
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'salahpassword')
                    ->press('Login')
                    ->assertSee('These credentials do not match our records'); // Ubah jika error berbeda
        });
    }

    public function test_login_fails_with_empty_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->press('Login')
                    ->assertSee('The email field is required') // Laravel default validation
                    ->assertSee('The password field is required');
        });
    }
}
