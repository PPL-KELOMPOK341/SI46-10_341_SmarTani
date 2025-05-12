<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WebsiteRunningTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000')
                    ->pause(2000)  // Tunggu selama 2 detik sebelum melanjutkan
                    ->assertSee('started');
        });
    }
    
}
