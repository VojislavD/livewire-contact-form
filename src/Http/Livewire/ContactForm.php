<?php

namespace VojislavD\LivewireContactForm\Http\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use VojislavD\LivewireContactForm\Mail\ContactFormMail;

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

        if(! config('livewireContactForm.mail.to')) {
            session()->flash('emailNotSent', __('Something went wrong, please try again.'));
        } else {
            Mail::to(config('livewireContactForm.mail.to'))
                ->send(new ContactFormMail($this->name, $this->email, $this->body));
                
            session()->flash('emailSent', __('Email successfully sent. We will respond to you as soon as possible.'));
            $this->reset(['name', 'email', 'body']);
        }
    }

    public function render()
    {
        return view('livewireContactForm::livewire.contact-form');
    }
}
