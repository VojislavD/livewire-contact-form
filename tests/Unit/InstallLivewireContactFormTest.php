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
        // Make sure to start from a clean state
        if (File::exists(config_path('livewireContactForm.php'))) {
            unlink(config_path('livewireContactForm.php'));
        }

        $this->assertFalse(File::exists(config_path('livewireContactForm.php')));

        Artisan::call('livewirecontactform:install');

        $this->assertTrue(File::exists(config_path('livewireContactForm.php')));
    }

    /**
     * @test
     */
    public function when_a_config_file_is_present_user_can_choose_to_not_overwrite_it()
    {
        // Create config file to already exists when install command check it
        File::put(config_path('livewireContactForm.php'), 'Test Content');
        $this->assertTrue(File::exists(config_path('livewireContactForm.php')));

        // When install command runs
        $command = $this->artisan('livewirecontactform:install');

        // Excepted a warning that configuration file already exists
        $command->expectsConfirmation(
            'Config file already exists. Do you want to overwrite it?',
            // When answered with 'no'
            'no'
        );

        // Should see a message that config file is not overwritten
        $command->expectsOutput('Existing configuration was not overwritten.');

        // Assert that the original content of the config file remain
        $this->assertEquals('Test Content', file_get_contents(config_path('livewireContactForm.php')));
    }
}