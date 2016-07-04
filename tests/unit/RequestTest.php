<?php

namespace Dugajean\Yaml\Tests;

class RequestTest extends TestCase
{
    /** @test */
    public function it_should_return_a_bool_if_page_wants_yaml_or_not()
    {
        $this->assertTrue($this->request->wantsYaml());
    }

    /** @test */
    public function it_should_return_a_bool_if_page_is_yaml_or_not()
    {
        // $this->assertTrue($this->request->isYaml());
    }
}
