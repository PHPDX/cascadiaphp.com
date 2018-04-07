<?php

namespace CascadiaPHP\Site\Template;

use CascadiaPHP\Site\Uri\UriResolver;
use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Zend\Diactoros\Uri;

class UriExtension implements ExtensionInterface, ContainerAwareInterface
{

    use ContainerAwareTrait;

    public function register(Engine $engine)
    {
        $engine->registerFunction('fullUri', [$this, 'fullUri']);
        // Deal with uri's for forms. They need to start with `//` instead of `http://`
        $engine->registerFunction('formUri', [$this, 'formUri']);
    }

    public function fullUri(string $path): Uri
    {
        return $this->container->get(UriResolver::class)->to($path);
    }

    public function formUri(string $path): string
    {
        return $this->container->get(UriResolver::class)->relativeSchemaTo($path);
    }
}
