<?php

namespace CascadiaPHP\Site\Router;

use League\Container\ContainerAwareInterface;
use League\Container\ContainerAwareTrait;
use Middlewares\Utils\CallableResolver\CallableResolverInterface;
use Middlewares\Utils\CallableResolver\ContainerResolver;
use Psr\Container\ContainerInterface;
use RuntimeException;

class RouteHandlerResolver implements CallableResolverInterface, ContainerAwareInterface
{

    use ContainerAwareTrait;

    /**
     * @var \Middlewares\Utils\CallableResolver\ContainerResolver
     */
    private $resolver;

    /**
     * RouteHandlerResolver constructor.
     * @param \Middlewares\Utils\CallableResolver\ContainerResolver $resolver
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __construct(ContainerResolver $resolver, ContainerInterface $container)
    {
        $this->resolver = $resolver;
        $this->container = $container;
    }

    /**
     * Resolves a callable.
     *
     * @param mixed $callable
     * @param array $args
     *
     * @throws RuntimeException If it's not callable
     *
     * @return callable
     */
    public function resolve($callable, array $args = [])
    {
        // Pipe the callable through the container resolver
        return function() use ($callable, $args) {
            return $this->container->call($this->resolver->resolve($callable, $args));
        };
    }
}
