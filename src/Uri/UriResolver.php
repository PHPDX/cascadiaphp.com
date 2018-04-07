<?php

namespace CascadiaPHP\Site\Uri;

use League\Container\ContainerAwareTrait;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UriInterface;
use RuntimeException;

class UriResolver
{
    use ContainerAwareTrait;

    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    /**
     * Get a fullURI to a path
     *
     * @param string $path
     * @return \Psr\Http\Message\UriInterface
     */
    public function to(string $path): UriInterface
    {
        return $this->getBaseUri()->withPath($path);
    }

    /**
     * Get a url string that has a relative schema:
     * https://example.com stays the same
     * http://example.com becomes //example.com
     *
     * @param string $path
     * @return string
     */
    public function relativeSchemaTo(string $path): string
    {
        $uri = (string) $this->to($path);

        // If it's an http:// uri, just return "//" for the scheme
        if (0 === strpos($uri, 'http:')) {
            return substr($uri, 5);
        }

        return $uri;
    }

    /**
     * Get the current base URI object
     *
     * @return UriInterface
     * @throws RuntimeException
     */
    protected function getBaseUri(): UriInterface
    {
        try {
            // Get the current request from the container. We do this because the request is immutable and may change
            // beneath us if we're keeping our own copy
            $request = $this->container->get(ServerRequestInterface::class);
        } catch (NotFoundExceptionInterface | ContainerExceptionInterface $e) {
            // No request found, let's just die.
            throw new RuntimeException('Unable to find the current request object.');
        }

        // Return the request url without any additional info
        return $request->getUri()->withQuery('')->withFragment('')->withPath('');
    }

}
