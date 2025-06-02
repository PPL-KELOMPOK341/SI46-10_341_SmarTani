<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BerandaAdminTest extends DuskTestCase
{

    // public function test_successful_login_as_admin()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/admin/login')
    //                 // ->waitFor('@email', 5)
    //                 ->type('email', 'admin@example.com')
    //                 ->type('password', 'password')
    //                 ->press('Login')
    //                 ->waitForLocation('/admin/beranda', 5)
    //                 ->assertSee('Selamat Datang, Admin SmarTani!')
    //                 ->pause(1000) // tunggu sidebar tampil
    //                 ->clickLink('Logout')
    //                 ->assertPathIs('/admin/login');
    //                 // ->assertSee('SmarTani')
    //                 // ->pause(1000);
    //     });
    // }
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
    public function test_can_view_dashboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/beranda')
                    //->assertPathIs('/admin/beranda') 
                    ->assertSee('Selamat Datang, Admin SmarTani!')
                    ->pause(1000) // tunggu sidebar tampil
                    //->clickLink('Logout')
                    //->assertPathIs('/admin/login');
                    // ->assertSee('SmarTani')
                    // ->pause(1000);
                    ->assertSee('Petani')
                    ->assertSee('Pengaduan')
                    ->assertSee('Setting Website');

            // Cek navigasi tombol Petani
            $browser->clickLink('Petani')
                    ->assertPathIs('/admin/users');

            // Kembali dan cek Pengaduan
            $browser->visit('/admin')
                    ->clickLink('Pengaduan')
                    ->assertPathIs('/pengaduan');

            // Kembali dan cek Setting Website
            $browser->visit('/admin')
                    ->clickLink('Setting Website')
                    ->assertRouteIs('setting.website');
        });
    }

}