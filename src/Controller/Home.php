<?php

namespace CascadiaPHP\Site\Controller;

use CascadiaPHP\Site\Schema\EventSchema;
use CascadiaPHP\Site\Uri\UriResolver;
use League\Plates\Template\Template;
use Psr\Http\Message\ResponseInterface;
use Spatie\SchemaOrg\Schema;

class Home extends Controller
{

    protected $cssPath = '/css/pages/home.css';

    /**
     * The main entry point for viewing the homepage
     * @param \CascadiaPHP\Site\Uri\UriResolver $uri
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function view(UriResolver $uri): ResponseInterface
    {
        // Handle setting the schema
        $this->setSchema($this->schema($uri));

        // Set general SEO stuff
        $this->seo()
            ->addImages($uri->relativeSchemaTo('/images/opengraph/main-banner.png'))
            ->setTitle('Cascadia PHP Conference held in Portland Oregon 2018')
            ->setDescription('Cascadia PHP is a non-profit community driven conference in the Pacific Northwest that ' .
                'is focused on PHP. In September 2018 it will be held in Portland Oregon, and will host dozens of ' .
                'speakers from around the world!');

        // Set opengraph specific stuff
        $this->seo()->opengraph()
            ->setUrl($uri->to('/'))
            ->setType('website')
            ->setSiteName('Cascadia PHP');

        // Set metatag specific stuff
        $this->seo()->metatags()
            ->setKeywords([
                'portland',
                'portland or',
                'portland usa',
                'php conference',
                'php 2018',
                'php conference 2018',
                'php developer',
                'web developer',
                'wordpress developer',
                'concrete5 developer',
                'drupal developer',
                'joomla developer'
            ]);

        return $this->render('/pages/home', '/');
    }

    protected function schema(UriResolver $uri)
    {
        return EventSchema::create($uri);
    }
}
