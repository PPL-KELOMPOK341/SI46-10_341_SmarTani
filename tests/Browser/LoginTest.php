<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_successful_login_as_farmer()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'test@example.com')
                    ->type('@password', 'password123')
                    ->press('@submit-login')
                    ->assertPathIs('/dashboard');

            $browser->click('.menu-icon')
                    ->pause(1000) // tunggu sidebar tampil
                    ->clickLink('Logout')
                    ->assertPathIs('/')
                    ->assertSee('SmarTani')
                    ->pause(1000);
        });
    }

    public function test_failed_login_due_to_unregistered_email()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'emailtidakterdaftar@gmail.com')
                    ->type('@password', 'password123')
                    ->press('@submit-login')
                    ->waitForText('These credentials do not match our records.', 10)
                    ->assertSee('These credentials do not match our records.');
        });
    }

    public function test_failed_login_due_to_wrong_password()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'test@example.com')
                    ->type('@password', 'password1234') // Password salah
                    ->press('@submit-login')
                    ->waitForText('These credentials do not match our records.', 10)
                    ->assertSee('These credentials do not match our records.');
        });
    }

    public function test_failed_login_due_to_empty_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@submit-login', 5)
                    ->press('@submit-login')
                    ->assertSee('SmartTani')
                    ->assertSee('SmartTani');
        });
    }

    public function test_failed_login_due_to_invalid_email_format()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'PetaniKUCimaunggmail.com') // tanpa '@'
                    ->type('@password', 'password123')
                    ->press('@submit-login')
                    ->assertSee('Masuk');
        });
    }

    // public function test_successful_login_with_remember_me()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/login')
    //                 ->waitFor('@email', 5)
    //                 ->type('@email', 'test@example.com')
    //                 ->type('@password', 'password123')
    //                 ->check('@remember-me')
    //                 ->press('@submit-login')
    //                 ->waitForLocation('/dashboard', 15)
    //                 ->assertSee('Berita Terkini');
    //     });
    // }

    // public function test_reset_password_request()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/login')
    //                 ->click('@forgot-password-link')
    //                 ->waitForLocation('/forgot-password', 10)
    //                 ->waitFor('@email', 5)
    //                 ->type('@email', 'test')
    //                 ->press('@submit-reset') // Sesuaikan dengan dusk="submit-reset"
    //                 ->waitForText('Link reset password telah dikirim ke email Anda.', 15)
    //                 ->assertSee('Link reset password telah dikirim ke email Anda.');
    //     });
    // }
}
