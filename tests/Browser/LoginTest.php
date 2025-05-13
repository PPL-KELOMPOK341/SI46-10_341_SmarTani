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
                    ->type('@email', 'petanicimaung@gmail.com')
                    ->type('@password', 'Petani543')
                    ->press('@submit-login')
                    ->waitForLocation('/dashboard', 15)
                    ->assertSee('Login berhasil');
        });
    }

    public function test_failed_login_due_to_unregistered_email()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'emailtidakterdaftar@gmail.com')
                    ->type('@password', 'Petani543')
                    ->press('@submit-login')
                    ->waitForText('Email atau password salah', 10)
                    ->assertSee('Email atau password salah');
        });
    }

    public function test_failed_login_due_to_wrong_password()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'petanicimaung@gmail.com')
                    ->type('@password', 'passwordsalah')
                    ->press('@submit-login')
                    ->waitForText('Email atau password salah', 10)
                    ->assertSee('Email atau password salah');
        });
    }

    public function test_failed_login_due_to_empty_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@submit-login', 5)
                    ->press('@submit-login')
                    ->waitForText('The email field is required.', 10)
                    ->assertSee('The email field is required.')
                    ->assertSee('The password field is required.');
        });
    }

    public function test_failed_login_due_to_invalid_email_format()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'PetaniKUCimaunggmail.com') // tanpa '@'
                    ->type('@password', 'tanicimaung67')
                    ->press('@submit-login')
                    ->waitForText('Format email tidak valid', 10)
                    ->assertSee('Format email tidak valid');
        });
    }

    public function test_successful_login_with_remember_me()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->waitFor('@email', 5)
                    ->type('@email', 'petanicimaung@gmail.com')
                    ->type('@password', 'Petani543')
                    ->check('@remember-me')
                    ->press('@submit-login')
                    ->waitForLocation('/dashboard', 15)
                    ->assertSee('Login berhasil');
        });
    }

    public function test_reset_password_request()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->click('@forgot-password-link')
                    ->waitForLocation('/forgot-password', 10)
                    ->waitFor('@email', 5)
                    ->type('@email', 'petanicimaung@gmail.com')
                    ->press('@submit-reset') // Sesuaikan dengan dusk="submit-reset"
                    ->waitForText('Link reset password telah dikirim ke email Anda.', 15)
                    ->assertSee('Link reset password telah dikirim ke email Anda.');
        });
    }
}
