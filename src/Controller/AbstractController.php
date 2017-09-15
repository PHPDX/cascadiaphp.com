<?php

namespace PHPDX\Site\Controller;

use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractController
{

    /** @var \Psr\Http\Message\ServerRequestInterface */
    protected $request;

    /** @var \League\Plates\Engine */
    protected $templates;

    /** @var string Default template to render */
    protected $template = 'notfound';

    public function __construct(ServerRequestInterface $request, Engine $templates)
    {
        $this->request = $request;
        $this->templates = $templates;
    }

    /**
     * Render the bound template
     * @return string
     */
    public function render()
    {
        return $this->templates->render($this->template);
    }
}
