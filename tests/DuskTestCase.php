<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;
use PHPUnit\Framework\Attributes\BeforeClass;

abstract class DuskTestCase extends BaseTestCase
{
    /**
     * Prepare for Dusk test execution.
     */
    #[BeforeClass]
    public static function prepare(): void
    {
        if (! static::runningInSail()) {
            static::startChromeDriver(['--port=9515']);
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver(): RemoteWebDriver
    {
        // Inisialisasi Chrome Options
        $options = (new ChromeOptions)->addArguments([
            '--start-maximized',
            '--disable-search-engine-choice-screen',
            '--disable-smooth-scrolling',
        ]);

        // Tambahkan headless mode jika tidak dinonaktifkan
        if (! $this->hasHeadlessDisabled()) {
            $options->addArguments([
                '--disable-gpu',
                // '--headless',  // Nonaktifkan headless agar GUI Chrome muncul
            ]);
        }

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? env('DUSK_DRIVER_URL') ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
}
