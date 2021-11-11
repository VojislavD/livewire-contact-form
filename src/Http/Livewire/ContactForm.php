<?php

namespace VojislavD\LivewireContactForm\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $body;

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        dd('submit');
    }

    public function render()
    {
        return view('livewireContactForm::livewire.contact-form');
    }
}