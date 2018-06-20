<?php

namespace CascadiaPHP\Site\Controller;

use CascadiaPHP\Site\SEO\SEOTools;
use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use League\Plates\Engine;
use Psr\Container\ContainerInterface;
use Spatie\SchemaOrg\Thing;
use Zend\Diactoros\Response\HtmlResponse;

abstract class Controller implements ContainerAwareInterface
{

    use ContainerAwareTrait;

    protected $cssPath = '/css/pages/brand.css';

    /**
     * @var \League\Plates\Engine
     */
    protected $engine;

    public function __construct(Engine $engine, ContainerInterface $container)
    {
        $this->engine = $engine;
        $this->setContainer($container);
    }

    /**
     * Render a template into a response
     *
     * @param string $path The path to the template, this is usually something like `/pages/home'
     * @param string $actionPath The canonical path to this action ie "/" for home "/register" for register
     * @param array $data The data to pass to the template
     * @return \Zend\Diactoros\Response\HtmlResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function render(string $path, string $actionPath, array $data = []): HtmlResponse
    {
        /** @var \CascadiaPHP\Site\Template\Template $template */
        $template = $this->engine->make($path);

        // Set the layout
        $template->layout('layout', ['active' => $actionPath]);

        // Pass in any css
        if ($this->cssPath) {
            $template->push('css');
            echo $template->inline($this->cssPath);
            $template->stop();
        }

        // Render the HTML
        $html = $template->render($data);

        // Build and return a new response
        return new HtmlResponse($html);
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
