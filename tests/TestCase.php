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
    public function setUp()
    {
        parent::setUp();

        $this->request = Request::capture();

        $this->request->headers->set('Accept', YamlResponse::CONTENT_TYPE);
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

    /**
     * Sets YAML content type header
     * 
     * @return void
     */
    protected function setYamlHeader()
    {
        $this->request->headers->set('Content-Type', YamlResponse::CONTENT_TYPE);
    }
}