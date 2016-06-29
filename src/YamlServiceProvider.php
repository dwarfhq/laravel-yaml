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
        $factory->macro('yaml', function ($value) use ($factory) {
            return $factory->make(strtoupper($value));
        });

        $request->macro('wantsYaml', function ($value) use ($request) {
            return $request->accepts(['/x-yaml', '+x-yaml']);
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
