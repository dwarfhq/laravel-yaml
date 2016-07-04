<?php

namespace Dugajean\Yaml;

use Symfony\Component\Yaml\Yaml as BaseYaml;

class YamlResponse extends BaseYaml
{
    const INLINE_YAML    = 1;
    const MULTILINE_YAML = 2;
    const INDENT_SIZE    = 4;
    const CONTENT_TYPE   = 'application/x-yaml';

    public static function dump($array, $inline = self::MULTILINE_YAML, $indent = self::INDENT_SIZE, $flags = 0)
    {
        return parent::dump($array, $inline, $indent, $flags);
    }

    public static function prepareHeaders(&$headers)
    {
        $headers['Content-Type'] = self::CONTENT_TYPE;
    }
}
