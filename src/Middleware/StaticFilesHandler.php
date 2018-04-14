<?php

namespace CascadiaPHP\Site\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Stream;

class StaticFilesHandler implements MiddlewareInterface
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
        $filepath = './public'.urldecode($request->getUri()->getPath());
        if (file_exists($filepath) && is_file($filepath)) {
            $range = $request->getHeaderLine('range');
            $range = str_replace('=', ' ', $range);

            $body = new Stream($filepath);
            $size = $body->getSize();
            $range .= '/' . $size;

            $mimeType = \mime_content_type($filepath);
            if ('.svg' === substr($filepath, -4)) {
                $mimeType = 'image/svg+xml'; // People don't use <?xml.. anymore :(
            }

            $response = new Response($body, 200, [
                'Content-type' => $mimeType,
            ]);
            return $response->withHeader('Content-Range', $range);
        }

        return $delegate->process($request);
    }
}