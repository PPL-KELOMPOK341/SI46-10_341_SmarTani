<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginAdminTest extends DuskTestCase
{
    public function test_successful_login_as_admin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    // ->waitFor('@email', 5)
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->waitForLocation('/admin/beranda', 5)
                    ->assertSee('Selamat Datang, Admin SmarTani!')
                    ->pause(1000) // tunggu sidebar tampil
                    ->clickLink('Logout')
                    ->assertPathIs('/admin/login');
                    // ->assertSee('SmarTani')
                    // ->pause(1000);
        });
    }

    public function test_failed_login_due_to_unregistered_email()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    //->waitFor('email', 5)
                    ->type('email', 'emailtidakterdaftar@gmail.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->waitForText('Email atau password salah.', 10)
                    ->assertSee('Email atau password salah.');
        });
    }

    public function test_failed_login_due_to_wrong_password()
    {
         $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    //->waitFor('email', 5)
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password123')
                    ->press('Login')
                    ->waitForText('Email atau password salah.', 10)
                    ->assertSee('Email atau password salah.');
        });
    }

    public function test_failed_login_due_to_empty_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->press('Login')
                    ->waitForText('Login Admin SmarTani', 10)
                    ->assertSee('Login Admin SmarTani');
        });
    }

    // public function test_failed_login_due_to_invalid_email_format()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/login')
    //                 ->waitFor('@email', 5)
    //                 ->type('@email', 'PetaniKUCimaunggmail.com') // tanpa '@'
    //                 ->type('@password', 'password123')
    //                 ->press('@submit-login')
    //                 ->assertSee('Masuk');
    //     });
    // }

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