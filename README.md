# Settings module

## Requirements
- [Laravel 8](https://github.com/laravel/laravel)
- [Laravel Modules package](https://github.com/nWidart/laravel-modules)

## Installation
1. Install Laravel
1. Install Laravel modules
1. Clone repo into Modules folder
1. Run `composer dump-autoload`
1. Run `php artisan module:seed Settings`

## Usage
### Code

```php
   // getters
   $plain = Setting::get('news_per_page');
   $localized = Setting::get('title','ru');
   
   // setters
   foreach($locales as $locale) {
       Setting::set('title',$locale, $value[$locale]);
   }
   
   // flush cache
   Setting::flush();
```
###Blade
```html
    @cfg('title') // returns setting with key title
    @cfg('title','ru') // returns localized setting with key title
```
