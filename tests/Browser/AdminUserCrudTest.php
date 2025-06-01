<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminUserCrudTest extends DuskTestCase
{
    /**
     * Test access to user index page
     */
    public function testAccessUserIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', 'admin@smartani.id')
                    ->type('password', 'admin12345')
                    ->press('Login')
                    ->assertPathIs('/admin/beranda')
                    ->clickLink('Data Petani')
                    ->assertSee('Daftar User')
                    ->assertSee('Nama')
                    ->assertSee('Email')
                    ->assertSee('Phone')
                    ->assertSee('Aksi')
                    ->pause(2000)
                    ->clickLink('Logout')
                    ->pause(2000);
        });
    }

    /**
     * Test creating a new user
     */
    public function testCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', 'admin@smartani.id')
                    ->type('password', 'admin12345')
                    ->press('Login')
                    ->pause(2000)
                    ->assertPathIs('/admin/beranda')
                    ->clickLink('Data Petani')
                    ->clickLink('Tambah Data')
                    ->pause(1000)
                    ->assertPathIs('/admin/users/create')
                    ->pause(2000)
                    ->type('name', 'Test User')
                    ->type('email', 'testuser@example.com')
                    ->type('phone', '1234567890')
                    ->type('password', 'password123')
                    ->type('password_confirmation', 'password123')
                    ->press('Simpan')
                    ->pause(2000)
                    ->assertSee('User created successfully.')
                    ->clickLink('Logout')
                    ->pause(2000);
        });
    }

    /**
     * Test editing an existing user
     */
    public function testEditUser()
    {
        $userEmail = 'admin@smartani.id';

        $this->browse(function (Browser $browser) use ($userEmail) {
            $browser->visit('/admin/login')
                    ->type('email', 'admin@smartani.id')
                    ->type('password', 'admin12345')
                    ->press('Login')
                    ->pause(2000)
                    ->assertPathIs('/admin/beranda')
                    ->clickLink('Data Petani')
                    ->with("table tbody tr:contains('{$userEmail}')", function ($row) {
                        $row->clickLink('Edit');
                    })
                    ->pause(2000)
                    ->assertSee('Edit User')
                    ->type('name', 'New Name')
                    ->type('email', 'admin@smartani.id')
                    ->type('phone', '1112223333')
                    ->press('Simpan')
                    ->pause(2000)
                    ->assertPathIs('/admin/users')
                    ->pause(2000)
                    ->assertSee('User updated successfully.')
                    ->assertSee('New Name')
                    ->clickLink('Logout')
                    ->pause(2000);
        });
    }

    /**
     * Test deleting a user
     */
   public function testDeleteUser()
{
    $userEmail = 'nrenner@example.net';
    $userId = 49; // ganti sesuai ID sebenarnya

    $this->browse(function (Browser $browser) use ($userEmail, $userId) {
        $browser->visit('/admin/login')
                ->type('email', 'admin@smartani.id')
                ->type('password', 'admin12345')
                ->press('Login')
                ->pause(1000)
                ->assertPathIs('/admin/beranda')
                ->clickLink('Data Petani')
                ->pause(1000)
                ->assertSee($userEmail)
                ->press("@delete-user-{$userId}")
                ->acceptDialog()
                ->pause(2000)
                ->assertPathIs('/admin/users')
                ->assertDontSee($userEmail)
                ->clickLink('Logout')
                ->pause(1000);
    });
}

/**
 * Test validation errors on create user form
 */
public function testValidationErrors()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/admin/login')
                ->type('email', 'admin@smartani.id')
                ->type('password', 'admin12345')
                ->press('Login')
                ->pause(2000)
                ->assertPathIs('/admin/beranda')
                ->clickLink('Data Petani')
                ->pause(1000)
                ->clickLink('Tambah Data')
                ->pause(1000)
                ->assertPathIs('/admin/users/create')
                ->press('Simpan') // kirim form kosong
                ->pause(2000)
                ->type('name', 'Test User Invalid')
                ->press('Simpan') 
                ->pause(2000)
                ->type('email', 'testuserinvalid@example.com')
                ->pause(1000)
                ->press('Simpan') 
                ->pause(2000)
                ->type('phone', '88888')
                ->press('Simpan')
                ->pause(2000)
                ->type('password', 'password123')
                ->press('Simpan')
                ->pause(2000)
                ->type('password_confirmation', 'password123')
                ->press('Simpan')
                ->pause(2000)
                ->assertSee('User created successfully.')
                ->clickLink('Logout')
                ->pause(1000);
    });
}

}   
