<?php

namespace VojislavD\LivewireContactForm\Tests;

use Illuminate\Support\Facades\Config;
use Livewire\LivewireServiceProvider;
use VojislavD\LivewireContactForm\LivewireContactFormServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Config::set('livewireContactForm.mail.to', 'test@example.com');
    }

    public function getEnvironmentSetUp($app)
    {

    }

    public function getPackageProviders($app)
    {
        return [
            LivewireContactFormServiceProvider::class,
            LivewireServiceProvider::class
        ];
    }
}