<?php

namespace Dugajean\Yaml;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class YamlRequest extends Request
{
    /**
     * Acceptable content type for YAML.
     * @var array
     */
    protected $contentTypeData = ['/x-yaml', '+x-yaml'];

    /**
     * Determine if the current request is asking for YAML in return.
     *
     * @return bool
     */
    public function wantsYaml()
    {
        $acceptable = $this->getAcceptableContentTypes();

        dd($acceptable);

        return isset($acceptable[0]) && Str::contains($acceptable[0], $this->contentTypeData);
    }

    /**
     * Determine if the request is sending YAML.
     *
     * @return bool
     */
    public function isYaml()
    {
        return Str::contains($this->header('CONTENT_TYPE'), $this->contentTypeData);
    }
}
