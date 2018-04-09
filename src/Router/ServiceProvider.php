<?php

namespace CascadiaPHP\Site\Router;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        Dispatcher::class
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
        // Set up the router
        $this->container->share(Dispatcher::class, function() {
            return \FastRoute\simpleDispatcher(function(RouteCollector $routeCollector) {
                return $this->routes($routeCollector);
            });
        });
    }

    /**
     * Load the routes from the bootstrap file
     */
    protected function routes(RouteCollector $r)
    {
        $container = $this->container;
        include dirname(__DIR__, 2) . '/bootstrap/routes.php';
    }
}
