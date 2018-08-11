<?php

namespace CascadiaPHP\Site\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\TextResponse;
use Zend\Diactoros\Uri;

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
        // Validate origin
        if (!$this->validOrigin($request)) {
            return new TextResponse('Unauthorized', 403);
        }

        // Resolve the response
        $response = $delegate->process($request);

        // Add our custom headers
        $response = $this->addHeaders($request, $response);

        // Pass the response back to the caller
        return $response;
    }

    private function addHeaders(ServerRequestInterface $request, ResponseInterface $response)
    {
        $origin = $this->getOrigin($request);
        $sourceOrigin = getenv('URI') ?? $this->getSourceOrigin($request);

        if ($origin) {
            $headers = [
                'Access-Control-Expose-Headers' => 'AMP-Access-Control-Allow-Source-Origin',
                'AMP-Access-Control-Allow-Source-Origin' => $sourceOrigin,
                'Access-Control-Allow-Origin' => $origin
            ];

            foreach ($headers as $key => $value) {
                $response = $response->withHeader($key, $value);
            }
        }

        return $response;
    }

    private function getOrigin(ServerRequestInterface $request)
    {
        if (!$request->hasHeader('origin')) {
            null;
        }

        return $request->getHeader('origin')[0] ?? null;
    }

    private function getSourceOrigin(ServerRequestInterface $request)
    {
        return $request->getQueryParams['__amp_source_origin'] ?? null;
    }

    private function validOrigin(ServerRequestInterface $request): bool
    {
        $origin = $this->getOrigin($request);
        $sourceOrigin = $this->getSourceOrigin($request);
        $sourceUri = getenv('URI');

        if ($sourceOrigin) {
            $normalizedSourceOrigin = new Uri($sourceOrigin);
            $normalizedUri = new Uri($sourceUri);

            if ((string) $normalizedSourceOrigin !== (string) $normalizedUri) {
                return false;
            }
        }


        if (!$origin && $request->getHeader('amp-same-origin') === true) {
            return true;
        }

        if (!$origin && $request->getMethod() === 'POST') {
            // All post requests should have a valid origin.
            return false;
        }

        if ($origin) {
            if ($sourceUri && strtolower($origin) === strtolower($sourceUri)) {
                return $sourceUri;
            }

            $allowedOrigins = [
                '/.*\.cdn\.ampproject\.org/',
                '/.+\.amp\.cloudflare\.com/',
                '/.*\.twilio\.com/',
                '/www\.cascadiaphp\.com/'
            ];

            foreach ($allowedOrigins as $originPattern) {
                if (preg_match($originPattern, $origin)) {
                    return true;
                }
            }
        }

        return true;
    }
}
