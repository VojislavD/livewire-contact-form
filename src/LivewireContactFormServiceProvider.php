<?php

namespace VojislavD\LivewireContactForm;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use VojislavD\LivewireContactForm\Http\Livewire\ContactForm;

class LivewireContactFormServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'livewireContactForm');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewireContactForm');
        
        Livewire::component('livewireContactForm:contact-form', ContactForm::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('livewirecontactform.php')
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/livewireContactForm')
            ], 'views');
        }
    }
}
