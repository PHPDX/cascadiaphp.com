<?php

namespace CascadiaPHP\Site\Controller;

use CascadiaPHP\Site\SEO\SEOTools;
use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use League\Plates\Engine;
use League\Plates\Template\Template;
use Psr\Container\ContainerInterface;
use Spatie\SchemaOrg\Thing;

abstract class Controller implements ContainerAwareInterface
{

    use ContainerAwareTrait;

    protected $cssPath = '/css/pages/brand.css';

    /**
     * @var \League\Plates\Engine
     */
    private $engine;

    public function __construct(Engine $engine, ContainerInterface $container)
    {
        $this->engine = $engine;
        $this->setContainer($container);
    }

    public function render(string $path): Template
    {
        /** @var \CascadiaPHP\Site\Template\Template $template */
        $template = $this->engine->make($path);

        // Set the layout
        $template->layout('layout');

        // Pass in any css
        if ($this->cssPath) {
            $template->push('css');
            echo $template->inline($this->cssPath);
            $template->stop();
        }

        return $template;
    }

    /**
     * Get the SEOMeta object we use to track SEO
     *
     * @return \Artesaos\SEOTools\SEOTools
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function seo(): SEOTools
    {
        return $this->container->get(SEOTools::class);
    }

    /**
     * Set a schema "thing" so that it's added to the output properly
     * @param \Spatie\SchemaOrg\Thing $thing
     * @return \CascadiaPHP\Site\Controller\Controller
     */
    protected function setSchema(Thing $thing): Controller
    {
        $this->container->add('schema', $thing);
        return $this;
    }

}
