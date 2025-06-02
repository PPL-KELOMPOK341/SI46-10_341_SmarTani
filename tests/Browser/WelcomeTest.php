<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WelcomeTest extends DuskTestCase
{
    public function testWelcomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->waitForText('Selamat Datang!', 15)  // tunggu sampai teks muncul maksimal 10 detik
                    ->assertSee('Selamat Datang!')
                    ->assertSee('Mulai Sekarang');

            $browser->click('#startBtn')
                    ->pause(500)
                    ->assertVisible('#loginOptions')
                    ->assertSeeLink('Login Petani')
                    ->assertSeeLink('Login Admin')
                    ->assertAttributeContains('a.btn-petani', 'href', '/login')
                    ->assertAttributeContains('a.btn-admin', 'href', '/admin/login');

            $browser->click('a.btn-petani')
                    ->assertPathIs('/login');

            $browser->visit('/')
                    ->click('#startBtn')
                    ->pause(500)
                    ->click('a.btn-admin')
                    ->assertPathIs('/admin/login');
        });
    }
}
