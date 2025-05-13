<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Penanaman;

class ExceptionFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group form-exception
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('form-exception')]
    public function user_tidak_bisa_mengisi_form_penanaman_dengan_kosong()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
    
            $browser->loginAs($user)
                    ->visit('/form-penanaman')
                    ->press('Simpan')
                    ->pause(1000)
                    // Validasi error HTML5 (form required field)
                    ->assertFocused('input[name="nama_tanaman"]'); // Akan tetap di field pertama yang kosong
        });
    }

    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('form-exception')]
    public function user_tidak_bisa_mengisi_form_penanaman_dengan_format_tanggal_salah()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();

            $browser->loginAs($user)
                    ->visit('/form-penanaman')
                    ->type('nama_tanaman', 'Jagung')
                    ->type('lokasi_lahan', 'Jl. Uji Validasi')
                    ->type('luas_lahan', 100)
                    ->select('periode', 'Periode I')
                    ->value('input[name="tanggal_penanaman"]', '2025-11-32') // Format salah
                    ->type('jumlah_pupuk', 50)
                    ->type('jumlah_bibit', 60)
                    ->press('Simpan')
                    ->pause(1000)
                    // Fokus masih di tanggal karena format salah
                    ->assertFocused('input[name="tanggal_penanaman"]');
        });
    }
}
