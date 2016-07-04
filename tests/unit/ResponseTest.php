<?php

namespace Dugajean\Yaml\Tests;

class ResponseTest extends TestCase
{   
    /**
     * Some sample data
     * @var array
     */
    protected $data = [
        'key0' => 'text', 
        'key1' => 'more text', 
        'key2' => 'even more text', 
        'key3' => 'array yay'
    ];

    /** @test */
    public function it_should_respond_with_yaml()
    {
        $yaml = response()->yaml($this->data)->getContent();

        $this->assertContains('even more text', $yaml);
        $this->assertCount(count($this->data), array_filter(explode("\n", $yaml)));
    }

    /** @test */
    public function it_should_return_string_null_if_object_is_passed_in_response()
    {
        $object = (object) $this->data;

        $yaml = response()->yaml($object)->getContent();

        $this->assertEquals('null', $yaml);
    }

    /** @test */
    public function it_should_change_the_http_status_code_when_provided_as_an_argument()
    {
        $response = response()->yaml($this->data, 201);

        $this->assertEquals(201, $response->getStatusCode());
    }

    /** @test */
    public function it_should_set_response_headers()
    {
        $httpHeader = 'Authorization';
        $authorizationToken = 'Bearer sometoken';

        $response = response()->yaml($this->data, 200, [$httpHeader => $authorizationToken]);

        $this->assertTrue($response->headers->has($httpHeader));
        $this->assertEquals($authorizationToken, $response->headers->get('authorization'));
    }

    /** @test */
    public function it_should_change_the_yaml_format()
    {
        $yamlInline = 0;

        $yaml = response()->yaml($this->data, 200, [], $yamlInline)->getContent();

        $this->assertContains('even more text', $yaml);
        $this->assertContains('{', $yaml);
        $this->assertCount(1, explode("\n", $yaml));
    }
}
