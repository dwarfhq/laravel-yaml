<?php

namespace Dugajean\Yaml\Tests;

use Illuminate\Http\Request;
use Dugajean\Yaml\YamlResponse;
use Dugajean\Yaml\YamlServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Holds the request
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     * Setup the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->request = Request::capture();

        $this->request->headers->set('CONTENT_TYPE', YamlResponse::CONTENT_TYPE);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [YamlServiceProvider::class];
    }
}
