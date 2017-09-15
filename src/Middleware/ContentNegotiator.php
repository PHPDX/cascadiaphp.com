<?php

namespace PHPDX\Site\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use League\Plates\Template\Template;
use Middlewares\Utils\Factory\ResponseFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Stream;

class ContentNegotiator implements MiddlewareInterface
{

    protected $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * Process an incoming server request and return a response, optionally delegating
     * to the next middleware component to create the response.
     *
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $response = $delegate->process($request);
        $basicResponse = $this->responseFactory->createResponse(200);

        if ($response instanceof Template) {
            $response = $response->render();
        }

        if (is_string($response)) {
            return $basicResponse->withBody(new Stream($response));
        }

        return $response;
    }
}
