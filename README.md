# Laravel YAML
YAML parser for Laravel.

This package will allow your application to determine whether the request wants a YAML response and then also respond with YAML.

## Install

You can pull in the package via composer:
``` bash
$ composer require dugajean/laravel-yaml
```

Now you should proceed with registereing the service provider, like so:

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
		response()->yaml(['This is my YAML response!']);
	}
}
});
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.