# Laravel YAML

[![GitHub issues](https://img.shields.io/github/issues/dugajean/laravel-yaml.svg)](https://github.com/dugajean/laravel-yaml/issues) 
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/dugajean/laravel-yaml/master/LICENSE) 
[![Packagist](https://img.shields.io/packagist/dt/dugajean/laravel-yaml.svg?maxAge=2592000)](https://packagist.org/packages/dugajean/laravel-yaml)

This package will allow your application to determine whether the request wants a YAML response and then also respond with YAML.

## Install

You can pull in the package via composer:
``` bash
$ composer require dugajean/laravel-yaml
```

Now you should proceed with registering the service provider, like so:

```php
// config/app.php

'providers' => [
    ...
    Dugajean\Yaml\YamlServiceProvider::class,
];
```

## Usage

See if the request wants a YAML response and then respond with YAML...

```php
// app/Http/routes.php

use Illuminate\Http\Request;

Route::get('/some/route', function (Request $request) {
	// Was this a YAML request?
	if ($request->wantsYaml()) {
		// Then let's respond with YAML!
		response()->yaml(['This is my YAML response!']);
	}
});
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.