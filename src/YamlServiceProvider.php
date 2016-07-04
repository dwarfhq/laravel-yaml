<?php

namespace Dugajean\Yaml;

use Illuminate\Support\Str;
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
        $factory->macro('yaml', function ($value, $status = 200, array $headers = [], $style = YamlResponse::MULTILINE_YAML) use ($factory) {
            YamlResponse::prepareHeaders($headers);
            return $factory->make(YamlResponse::dump($value, $style), $status, $headers);
        });

        $request->macro('wantsYaml', function () use ($request) {
            return YamlRequest::wantsYaml($request);
        });

        $request->macro('isYaml', function () use ($request) {
            return YamlRequest::isYaml($request);
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
