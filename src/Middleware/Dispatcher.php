<?php

namespace CascadiaPHP\Site\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use League\Container\ContainerInterface;
use Middlewares\Utils\Delegate;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Closure;
use RuntimeException;

class Dispatcher
{

    protected $container;
    private $stack;

    /**
     * @param MiddlewareInterface[]|string[] $stack middleware stack (with at least one middleware component)
     */
    public function __construct(array $stack, ContainerInterface $container)
    {
        $this->stack = $stack;
        $this->container = $container;
    }

    /**
     * Dispatches the middleware stack and returns the resulting `ResponseInterface`.
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function dispatch(ServerRequestInterface $request)
    {
        $resolved = $this->resolve(0);
        return $resolved->process($request);
    }

    /**
     * @return array|\Interop\Http\ServerMiddleware\MiddlewareInterface[]
     */
    public function getStack()
    {
        return $this->stack;
    }

    /**
     * @param array|\Interop\Http\ServerMiddleware\MiddlewareInterface[] $stack
     * @return Dispatcher
     */
    public function setStack($stack)
    {
        $this->stack = $stack;
        return $this;
    }

    /**
     * @param int $index middleware stack index
     *
     * @return DelegateInterface
     */
    private function resolve($index)
    {
        return new Delegate(function(ServerRequestInterface $request) use ($index) {
            // Make the container aware of our current request, the request may change between middlewares
            $this->container->share(ServerRequestInterface::class, $request);

            $middleware = isset($this->stack[$index]) ? $this->stack[$index] : new CallableMiddleware(function() {});

            if (is_string($middleware)) {
                $middleware = $this->container->get($middleware);
            }

            if ($middleware instanceof Closure) {
                $middleware = new CallableMiddleware($middleware);
            }

            if (!($middleware instanceof MiddlewareInterface)) {
                throw new RuntimeException('The middleware must be an instance of MiddlewareInterface');
            }

            $response = $middleware->process($request, $this->resolve($index + 1));

            if (!($response instanceof ResponseInterface)) {
                throw new RuntimeException('The middleware result must be an instance of ResponseInterface');
            }

            return $response;
        });
    }
}
