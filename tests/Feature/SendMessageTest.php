<?php

namespace VojislavD\LivewireContactForm\Tests\Feature;

use Livewire\Livewire;
use VojislavD\LivewireContactForm\Http\Livewire\ContactForm;
use VojislavD\LivewireContactForm\Mail\ContactFormMail;
use VojislavD\LivewireContactForm\Tests\TestCase;

class SendMessageTest extends TestCase
{
    /**
     * @test
     */
    public function test_validation_of_fields_from_contact_form()
    {
        Livewire::test(ContactForm::class)
            ->set('name', '')
            ->set('email', '')
            ->set('body', '')
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'required',
                'body' => 'required'
            ]);
        
        Livewire::test(ContactForm::class)
            ->set('name', 1)
            ->set('email', 'testnotemailaddress')
            ->set('body', 1)
            ->call('submit')
            ->assertHasErrors([
                'name' => 'string',
                'email' => 'email',
                'body' => 'string'
            ]);

        Livewire::test(ContactForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'johdoe@example.com')
            ->set('body', 'Hello World!')
            ->call('submit')
            ->assertHasNoErrors();
    }

    /**
     * @test
     */
    public function test_email_content()
    {
        $name = 'John Doe';
        $email = 'johndoe@example.com';
        $body = 'Hello World!';

        $mail = new ContactFormMail($name, $email, $body);

        $mail->assertSeeInHtml($name)
            ->assertSeeInHtml($email)
            ->assertSeeInHtml($body);
    }
}