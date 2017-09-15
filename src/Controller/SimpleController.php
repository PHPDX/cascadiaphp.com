<?php

namespace PHPDX\Site\Controller;

use League\Plates\Engine;

/**
 * Simple controller for rendering templates
 * Just bind a route to SimpleController::TemplateName to have `TemplateName` rendered
 */
class SimpleController
{

    /** @var \League\Plates\Engine */
    protected $templates;

    public function __construct(Engine $templates)
    {
        $this->templates = $templates;
    }

    /**
     * Render a template
     * @return string
     */
    public function __call($method, $args)
    {
        return $this->templates->render($method);
    }
}
