<?php

namespace PHPDX\Site\Controller;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use FastRoute\Dispatcher;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\Plates\Engine;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Middlewares\Utils\CallableResolver\ContainerResolver;
use Middlewares\Utils\Dispatcher as MiddlewareDispatcher;
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
        Dispatcher::class,
        CacheInterface::class
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
        $this->container->add(RequestHandler::class, function() {
            return $this->requestHandlerFactory();
        });

        // Set up templating
        $this->container->share(Engine::class, function() {
            $engine = new Engine(__DIR__ . '/../../templates');
            $engine->addData([
                'container' => $this->container
            ]);
            return $engine;
        });

        // Set up the server
        $this->container->share(Server::class, function() {
            return $this->diactorosFactory();
        });

        // Set up Request resolution
        $this->container->share(ServerRequestInterface::class, function() {
            return ServerRequestFactory::fromGlobals();
        });

        // Set up the router
        $this->container->share(Dispatcher::class, function() {
            return require __DIR__ . '/../../bootstrap/router.php';
        });

        // Set up cache
        $this->container->share(CacheInterface::class, function() {
            $filesystemAdapter = new Local(__DIR__ . '/../../cache/');
            $filesystem = new Filesystem($filesystemAdapter);

            return new FilesystemCachePool($filesystem);
        });
    }

    /**
     * Build the request handler middleware
     * @return RequestHandler
     */
    protected function requestHandlerFactory()
    {
        $resolver = new ContainerResolver($this->container);
        return new RequestHandler($resolver);
    }

    /**
     * Build the server
     * @return Server
     */
    protected function diactorosFactory()
    {
        // Get the middleware stack
        $middleware = new MiddlewareDispatcher([
            $this->container->get(FastRoute::class),
            $this->container->get(RequestHandler::class)
        ]);

        $request = $this->container->get(ServerRequestInterface::class);

        // Create a new diactoros server
        return Server::createServerFromRequest(function($request) use ($middleware) {
            return $middleware->dispatch($request);
        }, $request);
    }
}
