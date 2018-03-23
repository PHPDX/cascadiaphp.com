<?php

namespace CascadiaPHP\Site\Controller;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use CascadiaPHP\Site\Middleware\AmpMiddleware;
use CascadiaPHP\Site\Middleware\Dispatcher as MiddlewareDispatcher;
use CascadiaPHP\Site\Router\RouteHandlerResolver;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\Plates\Engine;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\SimpleCache\CacheInterface;
use Zend\Diactoros\Server;
use Zend\Diactoros\ServerRequestFactory;

class ServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        ServerRequestInterface::class,
        RequestHandler::class,
        ContainerInterface::class,
        Server::class,
        Engine::class,
        CacheInterface::class
    ];

    protected $middlewares = [
        AmpMiddleware::class,
        FastRoute::class,
        RequestHandler::class // This handler is our route dispatcher, it must be last.
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        // Share the container
        $this->container->share(ContainerInterface::class, $this->container);

        // Add a factory for the build handler
        $this->container->add(RequestHandler::class, function () {
            return $this->requestHandlerFactory();
        });

        // Set up the server
        $this->container->share(Server::class, function () {
            return $this->diactorosFactory();
        });

        // Set up Request resolution
        $this->container->share(ServerRequestInterface::class, function () {
            return ServerRequestFactory::fromGlobals();
        });

        // Set up filesystem
        $this->container->share(Filesystem::class, function () {
            $filesystemAdapter = new Local(__DIR__ . '/../../cache/');
            return new Filesystem($filesystemAdapter);
        });

        // Set up cache
        $this->container->share(CacheInterface::class, function () {
            return $this->container->get(FilesystemCachePool::class);
        });
    }

    /**
     * Build the request handler middleware
     * @return RequestHandler
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function requestHandlerFactory()
    {
        $resolver = $this->container->get(RouteHandlerResolver::class);
        return new RequestHandler($resolver);
    }

    /**
     * Build the server
     * @return Server
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function diactorosFactory()
    {
        // Get the middleware stack
        $middleware = $this->container->get(MiddlewareDispatcher::class, ['stack' => $this->middlewares]);

        // Get the initial request to dispatch
        $request = $this->container->get(ServerRequestInterface::class);

        // Create a new diactoros server
        return Server::createServerFromRequest(function (ServerRequestInterface $request) use ($middleware) {
            return $middleware->dispatch($request);
        }, $request);
    }
}
