<?php

namespace CascadiaPHP\Site\SEO;

/**
 * A simple stub config class to satisfy our SEOMeta class
 */
class SEOMetaConfig
{

    private $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get($item, $default = null)
    {
        return $this->items[$item] ?? $default;
    }

}
