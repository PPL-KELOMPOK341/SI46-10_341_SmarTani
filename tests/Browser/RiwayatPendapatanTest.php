<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RiwayatPendapatanTest extends DuskTestCase
{
    /** @test */
    public function user_bisa_melihat_riwayat_pendapatan()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3) // pastikan ID 1 adalah user yang valid
                    ->visit(route('riwayat_pendapatan.index'))
                    ->assertSee('Riwayat Pendapatan')
                    ->assertSee('Nama Tanaman')
                    ->assertSee('Tanggal Pemasukan')
                    ->assertSee('Total Hasil');
        });
    }

    /** @test */
    public function user_bisa_mencari_pendapatan()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3)
                    ->visit(route('riwayat_pendapatan.index'))
                    ->type('search', 'Penjualan') // ganti "Jagung" sesuai data yang memang ada
                    ->press('Cari')
                    ->assertSee('Penjualan') // pastikan kata yang dicari muncul
                    ->screenshot('pencarian-pendapatan');
        });
    }

    /** @test */
    public function user_bisa_sortir_tanggal_sumber_total()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3)
                    ->visit(route('riwayat_pendapatan.index'))

                    // Sortir Tanggal
                    ->clickLink('Tanggal Pemasukan')
                    ->pause(4000)

                    // Sortir Sumber
                    ->clickLink('Sumber Pendapatan')
                    ->pause(4000)

                    // Sortir Total Hasil
                    ->clickLink('Total Hasil')
                    ->pause(4000);
        });
    }

    /** @test */
    public function user_bisa_melihat_detail_pendapatan()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3)
                    ->visit(route('riwayat_pendapatan.index'))
                    ->clickLink('Detail')
                    ->assertPathBeginsWith('/pendapatan') // pastikan membuka halaman detail
                    ->assertSee('Detail Pendapatan')
                    ->pause(4000); // sesuaikan dengan apa yang muncul di halaman detail
                
        });
    }





}
