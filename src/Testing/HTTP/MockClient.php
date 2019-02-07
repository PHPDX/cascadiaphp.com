<?php

namespace CascadiaPHP\Site\Testing\HTTP;

use CascadiaPHP\Site\Middleware\AmpMiddleware;
use CascadiaPHP\Site\Middleware\Dispatcher;
use CascadiaPHP\Site\ProviderAggregate;
use CascadiaPHP\Site\Testing\TestCase;
use Http\Mock\Client;
use League\Container\Container;
use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MockClient extends Client
{

    protected $middlewares = [
        'full' => [
            AmpMiddleware::class,
            FastRoute::class,
            RequestHandler::class
        ],
        'simple' => [
            FastRoute::class,
            RequestHandler::class
        ]
    ];

    protected $middlewareStacks = [];

    /** @var ContainerInterface */
    protected static $container;

    public function sendRequest(RequestInterface $request, TestCase $testCase = null, $withMiddleware = true): ResponseInterface
    {
        // Get a new middleware stack
        $stack = $this->getMiddlewareStack($withMiddleware);

        // Set the request on the container
        $this->getContainer()->share(ServerRequestInterface::class, $request);

        // Send the request through the stack to get a response
        $response = $stack->dispatch($request);

        // Pack this into our mock response
        $mockResponse = new MockResponse(
            $request,
            $testCase,
            $response->getBody(),
            $response->getStatusCode(),
            $response->getHeaders());

        return $mockResponse;
    }

    private function getMiddlewareStack($full = true): Dispatcher
    {
        // Figure out which stack we want
        $stack = $full ? 'full' : 'simple';
        if (!isset($this->middlewareStacks[$stack])) {
            // Build the stack and add it to cache
            $this->middlewareStacks[$stack] = $this->getContainer()->get(Dispatcher::class, [
                // Use the proper list of middleware
                'stack' => $this->middlewares[$stack]
            ]);
        }

        // Return the cached stack
        return $this->middlewareStacks[$stack];
    }

    public function getContainer()
    {
        if (static::$container) {
            return static::$container;
        }

        $container = new Container(new ProviderAggregate());
        $container->delegate(new \League\Container\ReflectionContainer());
        $container->share(ContainerInterface::class, $container);
        static::$container = $container;

        return static::$container;
    }

}
