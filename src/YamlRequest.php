<?php

namespace Dugajean\Yaml;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class YamlRequest
{
    /**
     * Acceptable content type for YAML.
     * @var array
     */
    protected static $contentTypeData = ['/x-yaml', '+x-yaml'];

    /**
     * Determine if the current request is asking for YAML in return.
     *
     * @return bool
     */
    public static function wantsYaml(Request $request)
    {
        return $request->accepts(YamlResponse::CONTENT_TYPE);
    }

    /**
     * Determine if the request is sending YAML.
     *
     * @return bool
     */
    public static function isYaml(Request $request)
    {
        return Str::contains($request->header('CONTENT_TYPE'), self::$contentTypeData);
    }
}
