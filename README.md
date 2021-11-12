# Simple contact form created with Livewire

---
This Laravel package add simple Livewire component for contact form, without any styling.

---
Once package is installed, include Livewire component on page where you want to have contact form, with one of Livewire's method for rendering component.

`@livewire('livewireContactForm:contact-form')` 

or 

`<livewire:livewireContactForm:contact-form />`

## Installation

You can install the package via composer:

```bash
composer require vojislavd/livewire-contact-form
```

After that run install command:
```bash
php artisan livewirecontactform:install
```
#### NOTE
Make sure to include Livewire scripts on every page you plan to use this component.

Add `@livewireStyles` inside `<head></head>` tag of your HTML page and add `@livewireScripts` right before closing `<body></body>` tag.

For example:
```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>
  @livewireStyles
</head>
<body>

  @livewireScripts
</body>
</html>
```

Optionally, you can publish:

Config file again:
```bash
php artisan vendor:publish --provider="VojislavD\LivewireContactForm\LivewireContactFormServiceProvider" --tag="config"
```

Views:
```bash
php artisan vendor:publish --provider="VojislavD\LivewireContactForm\LivewireContactFormServiceProvider" --tag="views"
```

Livewire component:
```bash
php artisan vendor:publish --provider="VojislavD\LivewireContactForm\LivewireContactFormServiceProvider" --tag="livewire-component"
```

Mail:
```bash
php artisan vendor:publish --provider="VojislavD\LivewireContactForm\LivewireContactFormServiceProvider" --tag="mail"
```

This is the contents of the published config file:

```php
return [
    'mail' => [
        'to' => env('CONTACT_FORM_MAIL_TO', null)
    ]
];
```

## Usage
In .env file define email address where messages from contact form will be sent.

```
CONTACT_FORM_MAIL_TO=test@example.com
```

Include component to your HTML page
```html
@livewire('livewireContactForm:contact-form')
```

To style contact form or email, publish view assets.

Edit Contact Form: `resrouces/views/vendor/livewireContactForm/livewire/contact-form.blade.php`

Edit Mail: `resrouces/views/vendor/livewireContactForm/mail/contact-form-mail.blade.php`

## Testing
Run the tests with:

```bash
composer test
```

## Credits

- [Vojislav Dragicevic](https://vojislavd.com/)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
