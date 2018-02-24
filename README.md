# Laravel 5.6 Localization package

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel 5.6 Localization package with language chooser

## Demo

You can see working [demo](http://admin.hostato.com)

## Install



##### Install the package Via Composer

``` bash
$ composer require adamibrahim/localization
```

##### If you installing at laravel 5.5 or higher then you may go directly to Publish other wise you will need to edit composer.json and register the Service Provider

### composer.json

Add this code to your composer.json under the autoload at your main directory

``` bash
"psr-4": {
            "Adam\\Localization\\": "vendor/adamibrahim/localization/src"
        }
```

### Service Provider

At file config/app.php register service provider under * Package Service Providers...

``` bash
Adam\Localization\LocalizationServiceProvider::class,
```

### Publishing

run this command

``` bash
$ php artisan vendor:publish --provider="Adam\Localization\LocalizationServiceProvider" --force
```


### Database Migrating

run the Artisan migration command 

``` bash
$ php artisan migrate
```

### Seeding
Run the Artisan Seeding command

``` bash
$ php artisan db:seed --class=Adam\Localization\database\seeds\LanguagesTableSeeder
```

### Artisan Seed Error
If you receive this Error: 
###### Class Adam\Localization\database\seeds\LanguagesTableSeeder does not exist
Then you may need to dump-autoload by running this command 
``` bash
$ composer dump-autoload
```

Then run the seeding command once again

``` bash
$ php artisan db:seed --class=Adam\Localization\database\seeds\LanguagesTableSeeder
```
### Add the language change buttons to your blade template
``` bash
@if (($languages)->count() > 1)
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('img/flags/'.$lang->flag) }}"> {{ $lang->abbr }}<span class="caret"></span>
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach($languages as $language)
                <a href="{{ route('language.change', $language->abbr) }}" class="dropdown-item">
                    <img src="{{ asset('img/flags/'.$language->flag) }}"> {{$language->name}}
                </a>
            @endforeach
        </div>
    </li>
@endif
```
## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Hostato](http://wwww.hostato.com)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/adamibrahim/localization
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/adamibrahim/localization
[link-author]: https://github.com/adamibrahim
[link-contributors]: ../../contributors