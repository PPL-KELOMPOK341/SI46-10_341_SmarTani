<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class SettingWebsiteTest extends DuskTestCase
{
   
    // public function test_successful_login_as_admin()
    // {
        
    //         $this->browse(function (Browser $browser) {
    //             $browser->visit('/admin/login')
    //                 // ->waitFor('@email', 5)
    //                 ->type('email', 'admin@example.com')
    //                 ->type('password', 'password')
    //                 ->press('Login');
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
                    ->pause(1000); // tunggu sidebar tampil
                    // ->clickLink('Logout')
                    // ->assertPathIs('/admin/login');
                    // ->assertSee('SmarTani')
                    // ->pause(1000);
        });
    }
    public function test_user_can_update_setting_website()
    {
            $this->browse(function (Browser $browser) {
                $browser->visit('/admin/setting-website')
                    ->assertSee('Setting Website')
                    ->type('input[name="site_title"]', 'SMARTANI EDITAN')
                    ->type('input[name="site_description"]', 'SMARTANI Editann...')
                    // ->attach('input[name="site_logo"]', public_path('images/test-logo.png'))
                    ->type('input[name="site_version"]', '1.0')
                    ->press('Simpan')
                    ->assertPathIs('/admin/setting-website')
                    ->assertSee('Pengaturan berhasil disimpan!');
        });
    }
}
