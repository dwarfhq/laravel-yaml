<?php

namespace Dugajean\Yaml;

use Symfony\Component\Yaml\Yaml as BaseYaml;

class YamlResponse extends BaseYaml
{
    const INLINE_YAML    = 1;
    const MULTILINE_YAML = 2;
    const CONTENT_TYPE   = 'application/x-yaml';

    public static function dump($array, $inline = self::MULTILINE_YAML, $indent = 4, $flags = 0)
    {
        parent::dump($array, $inline = 2, $indent = 4, $flags = 0);
    }

    public static function prepareHeaders(&$headers)
    {
        $headers['Content-Type'] = self::CONTENT_TYPE;
    }
}