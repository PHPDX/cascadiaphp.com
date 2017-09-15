<?php

namespace PHPDX\Site;

use Dotenv\Dotenv;
use FastRoute\Dispatcher as FastRouteDispatcher;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use League\Plates\Engine;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Middlewares\Utils\CallableResolver\ContainerResolver;
use Middlewares\Utils\Dispatcher;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Server;
use Zend\Diactoros\ServerRequestFactory;

class ServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    protected $provides = [
        RequestHandler::class,
        ContainerInterface::class,
        Server::class,
        Engine::class,
        ServerRequestInterface::class,
        FastRouteDispatcher::class
    ];

    /**
     * Register site specific stuff
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
            return new Engine(__DIR__ . '/../templates');
        });

        // Set up the server
        $this->container->share(Server::class, function() {
            return $this->diactorosFactory();
        });

        // Set up Request resolution
        $this->container->share(ServerRequestInterface::class, function() {
            return ServerRequestFactory::fromGlobals();
        });

        $this->container->share(FastRouteDispatcher::class, function() {
            return require __DIR__ . '/../bootstrap/router.php';
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
        $middleware = new Dispatcher([
            $this->container->get(FastRoute::class),
            $this->container->get(RequestHandler::class)
        ]);

        $request = $this->container->get(ServerRequestInterface::class);

        // Create a new diactoros server
        return Server::createServerFromRequest(function($request) use ($middleware) {
            return $middleware->dispatch($request);
        }, $request);
    }

    /**
     * Load in our .env stuff
     */
    public function boot()
    {
        // Load in .env
        try {
            // Load in additional version stuff
            $env = new Dotenv(__DIR__ . '/../', '.version');
            $env->load();

            // Load in the .env
            $env = new Dotenv(__DIR__ . '/../');
            $env->load();
        } catch (\Exception $e) {
        }
    }
}
