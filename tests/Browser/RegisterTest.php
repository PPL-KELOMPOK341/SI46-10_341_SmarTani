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
        $this->browse(function (Browser $browser) {
            // Clear any existing test user
            DB::table('users')->where('email', 'test@example.com')->delete();
            
            $browser->visit('/register')
                   ->type('name', 'Test User')
                   ->type('email', 'test@example.com')
                   ->type('phone', '081234567890')
                   ->type('password', 'password123')
                   ->type('password_confirmation', 'password123')
                   ->press('Register')
                   ->assertPathIs('/login');

            // Verify user was created in database
            $this->assertDatabaseHas('users', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'phone' => '081234567890'
            ]);
        });
    }

    #[Test]
    public function test_duplicate_email_registration()
    {
        $this->browse(function (Browser $browser) {
            // Clear any existing test users
            DB::table('users')->whereIn('email', ['existing@example.com'])->delete();
            
            // Create a user first
            User::create([
                'name' => 'Existing User',
                'email' => 'existing@example.com',
                'phone' => '081234567891',
                'password' => Hash::make('password123')
            ]);

            $browser->visit('/register')
                   ->type('name', 'New User')
                   ->type('email', 'existing@example.com')
                   ->type('phone', '081234567891')
                   ->type('password', 'password123')
                   ->type('password_confirmation', 'password123')
                   ->press('Register')
                   ->assertSee('The email has already been taken');
        });
    }

    #[Test]
    public function test_password_encryption()
    {
        $this->browse(function (Browser $browser) {
            // Clear any existing test user
            DB::table('users')->where('email', 'password.test@example.com')->delete();
            
            $browser->visit('/register')
                   ->type('name', 'Password Test User')
                   ->type('email', 'password.test@example.com')
                   ->type('phone', '081234567892')
                   ->type('password', 'password123')
                   ->type('password_confirmation', 'password123')
                   ->press('Register')
                   ->assertPathIs('/login');

            // Get the user from database
            $user = User::where('email', 'password.test@example.com')->first();
            
            // Verify password is hashed
            $this->assertTrue(Hash::check('password123', $user->password));
            // Verify raw password is not stored
            $this->assertNotEquals('password123', $user->password);
        });
    }

    #[Test]
    public function test_invalid_email_format()
    {
        $this->browse(function (Browser $browser) {
            // Clear any existing test users
            DB::table('users')->whereIn('email', ['invalidemail.com', 'invalid@email'])->delete();
            
            // Test with invalid email without @
            $browser->visit('/register')
                   ->type('name', 'Invalid Email User')
                   ->type('email', 'invalidemail.com')
                   ->type('phone', '081234567893')
                   ->type('password', 'password123')
                   ->type('password_confirmation', 'password123')
                   ->press('Register')
                   ->assertSee('The email must be a valid email address');

            // Test with invalid email without domain
            $browser->visit('/register')
                   ->type('name', 'Invalid Email User')
                   ->type('email', 'invalid@email')
                   ->type('phone', '081234567894')
                   ->type('password', 'password123')
                   ->type('password_confirmation', 'password123')
                   ->press('Register')
                   ->assertSee('The email must be a valid email address');
        });
    }
}
