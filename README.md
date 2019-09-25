# Warcott Laravel Forms
It parses Warcott's json forms and displays a form. It uses [Warcott Client library](https://gitlab.objectsystems.com/web/warcott-client) to fetch the data from the server.
This library is in progress and not all field inputs from Warcott are supported. Behaviour from Preview of the form may vary as it is pure javascript realization.

## Installation
Simply add the following line to your `composer.json` and run install/update:

    "osi/warcott-laravel-form": "*"
    
## Configuration

Publish the package config files to enter your credentials

    php artisan vendor:publish --tag=warcott  --force

## Usage
This is an example of displaying a form Layout in your view.
```blade
{{ warcottDisplay('domainKey') }}
```
For API consummation, mapping of data and form manupulation you can check [Warcott Client's usage](https://gitlab.objectsystems.com/web/warcott-client#usage)

## Developers info
If you want to show all errors for unsupported fields you can change `resources/views/fields/base.blade.php` line   
`@includeIf('warcott::fields.'.($field['type'] ?? 'text'))`  
with   
`@include('warcott::fields.'.($field['type'] ?? 'text'))`