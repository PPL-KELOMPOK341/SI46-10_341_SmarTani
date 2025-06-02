<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Test;

class RegisterTest extends DuskTestCase
{
    #[Test]
    public function test_successful_registration()
    {
        DB::table('users')->where('email', 'test@example.com')->delete();

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertPresent('form')
                    ->type('@name', 'Test User')  // Gunakan dusk selector
                    ->type('@email', 'test@example.com')
                    ->type('@phone', '081234567890')
                    ->type('@password', 'password123')
                    ->type('@password_confirmation', 'password123')
                    ->press('@submit-register')  // Gunakan dusk selector
                    ->assertPathIs('/dashboard');
        });

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '081234567890',
        ]);
    }

    #[Test]
    public function test_duplicate_email_registration()
    {
        User::updateOrCreate(
            ['email' => 'existing@example.com'],
            [
                'name' => 'Existing User',
                'phone' => '081234567891',
                'password' => Hash::make('password123'),
            ]
        );

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertPresent('form')
                    ->type('@name', 'New User')
                    ->type('@email', 'existing@example.com')
                    ->type('@phone', '081234567891')
                    ->type('@password', 'password123')
                    ->type('@password_confirmation', 'password123')
                    ->press('@submit-register')  // Gunakan dusk selector
                    ->assertSee('The email has already been taken');  // Pastikan pesan error muncul
        });
    }

    #[Test]
    public function test_password_encryption()
    {
        DB::table('users')->where('email', 'password.test@example.com')->delete();

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertPresent('form')
                    ->type('@name', 'Password Test User')
                    ->type('@email', 'password.test@example.com')
                    ->type('@phone', '081234567892')
                    ->type('@password', 'password123')
                    ->type('@password_confirmation', 'password123')
                    ->press('@submit-register')  // Gunakan dusk selector
                    ->assertPathIs('/login');
        });

        $user = User::where('email', 'password.test@example.com')->first();

        $this->assertNotNull($user);
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertNotEquals('password123', $user->password);
    }

    #[Test]
    public function test_invalid_email_format()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertPresent('form')
                    ->type('@name', 'Invalid Email User')
                    ->type('@email', 'invalidemail.com')
                    ->type('@phone', '081234567893')
                    ->type('@password', 'password123')
                    ->type('@password_confirmation', 'password123')
                    ->press('@submit-register')  // Gunakan dusk selector
                    ->pause(2000)
                    ->dump('@email-error');

            $browser->visit('/register')
                    ->assertPresent('form')
                    ->type('@name', 'Invalid Email User')
                    ->type('@email', 'invalid@email')
                    ->type('@phone', '081234567894')
                    ->type('@password', 'password123')
                    ->type('@password_confirmation', 'password123')
                    ->press('@submit-register')  // Gunakan dusk selector
                    ->pause(2000)
                    ->dump('@email-error');
        });
    }
}