<?php

namespace CascadiaPHP\Site\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * Class ErrorDecoratorMiddleware
 * @package CascadiaPHP\Site\Middleware
 *
 * This middleware captures errors and does stuff with them
 * - Converts 404's to nice 404's
 * - Catches exceptions
 * - @todo log stuff
 */
class ErrorDecoratorMiddleware implements MiddlewareInterface
{

    /**
     * @var Engine
     */
    private $templates;

    public function __construct(Engine $templates)
    {
        $this->templates = $templates;
    }

    /**
     * Process an incoming server request and return a response, optionally delegating
     * to the next middleware component to create the response.
     *
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     *
     * @return ResponseInterface
     *
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $debug = filter_var(getenv('DEBUG') ?: 'false', FILTER_VALIDATE_BOOLEAN);
        if ($debug) {
            $response = $delegate->process($request);
        } else {
            try {
                // We don't need to do anything with our requests, so lets just get the response
                $response = $delegate->process($request);
            } catch (\Exception | \Error $e) {
                error_log($e->getMessage(), $e->getCode());
                return new HtmlResponse($this->templates->render('/pages/errors/500'), 500);
            }
        }

        // Check for 404
        if ($response->getStatusCode() === 404) {
            return new HtmlResponse($this->templates->render('/pages/errors/404'), 404);
        }

        return $response;
    }

}