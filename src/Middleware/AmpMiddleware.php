<?php

namespace CascadiaPHP\Site\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AmpMiddleware implements MiddlewareInterface
{

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
        // Resolve the response
        $response = $delegate->process($request);

        // Add our custom headers
        $response = $this->addHeaders($request, $response);

        // Pass the response back to the caller
        return $response;
    }

    private function addHeaders(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $response
            ->withAddedHeader(
                'access-control-expose-headers',
                'AMP-Access-Control-Allow-Source-Origin')
            ->withAddedHeader(
                'AMP-Access-Control-Allow-Source-Origin',
                (string) $request->getUri()->withPath('')->withQuery('')->withFragment(''));
    }
}
