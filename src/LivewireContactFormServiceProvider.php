<?php

namespace VojislavD\LivewireContactForm;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use VojislavD\LivewireContactForm\Http\Livewire\ContactForm;

class LivewireContactFormServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewireContactForm');

        Livewire::component('livewireContactForm:contact-form', ContactForm::class);
    }
}