<?php

namespace CascadiaPHP\Site\Template;

use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Psr\Http\Message\ServerRequestInterface;
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
        $request = $this->getContainer()->get(ServerRequestInterface::class);
        return $request->getUri()
            ->withQuery('')
            ->withFragment('')
            ->withPath($path);
    }

    public function formUri(string $path): string
    {
        $uri = (string) $this->fullUri($path);

        if (0 === strpos($uri, 'http:')) {
            return substr($uri, 5);
        }

        return $uri;
    }
}
