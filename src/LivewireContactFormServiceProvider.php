<?php

namespace VojislavD\LivewireContactForm;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use VojislavD\LivewireContactForm\Console\Commands\InstallLivewireContactForm;
use VojislavD\LivewireContactForm\Http\Livewire\ContactForm;

class LivewireContactFormServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'livewireContactForm.php');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewireContactForm');
        
        Livewire::component('livewireContactForm:contact-form', ContactForm::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallLivewireContactForm::class
            ]);

            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('livewireContactForm.php')
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/livewireContactForm')
            ], 'views');

            $this->publishes([
                __DIR__.'/Http/Livewire' => app_path('Http/Livewire')
            ], 'livewire-components');

            $this->publishes([
                __DIR__.'/Mail' => app_path('Mail')
            ], 'mail');
        }
    }
}
