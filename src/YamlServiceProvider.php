<?php

namespace Dugajean\Yaml;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;

class YamlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(ResponseFactory $factory, Request $request)
    {
        $factory->macro('yaml', function ($value, $status = 200, array $headers = []) use ($factory) {
            YamlResponse::prepareHeaders($headers);
            return $factory->make(YamlResponse::dump($value), $status, $headers);
        });

        $request->macro('wantsYaml', function () {
            return (new YamlRequest)->wantsYaml();
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Code here
    }
}
