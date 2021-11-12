<?php

namespace VojislavD\LivewireContactForm\Tests;

use Livewire\LivewireServiceProvider;
use VojislavD\LivewireContactForm\LivewireContactFormServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
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