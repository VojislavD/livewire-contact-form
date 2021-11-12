<?php

namespace VojislavD\LivewireContactForm\Tests\Unit;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use VojislavD\LivewireContactForm\Tests\TestCase;

class InstallLivewireContactFormTest extends TestCase
{
    /**
     * @test
     */
    public function the_install_command_copies_the_configuration()
    {
        // Make sure we're starting from a clean state
        if (File::exists(config_path('livewireContactForm.php'))) {
            unlink(config_path('livewireContactForm.php'));
        }

        $this->assertFalse(File::exists(config_path('livewireContactForm.php')));

        Artisan::call('livewirecontactform:install');

        $this->assertTrue(File::exists(config_path('livewireContactForm.php')));
    }
}