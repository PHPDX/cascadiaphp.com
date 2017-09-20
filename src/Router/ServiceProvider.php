<?php

namespace PHPDX\Site\Router;

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
        $this->container->share(Dispatcher::class, function () {
            return \FastRoute\simpleDispatcher(function(RouteCollector $routeCollector) {
                return $this->routes($routeCollector);
            });
        });
    }

    protected function routes(RouteCollector $r)
    {
        $r->get('/', '\PHPDX\Site\Controller\HomeController::home');
        $r->get('/events', '\PHPDX\Site\Controller\EventsController::events');
    }
}
