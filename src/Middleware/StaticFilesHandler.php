<?php

namespace CascadiaPHP\Site\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use SplFileInfo;
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
        // Get the path to the public file
        $filepath = dirname(__DIR__, 2) . '/public' . urldecode($request->getUri()->getPath());

        // Sanitize the path, we do not want traversal
        if (strpos($filepath, '/../') !== false || strpos($filepath, '\\..\\') !== false) {
            return new Response\TextResponse('Invalid path traversal detected.', 404);
        }

        // If this file actually exists
        if (file_exists($filepath) && is_file($filepath)) {
            // Get file info
            $file = new SplFileInfo($filepath);;

            // Return a new response packed with goodies
            return (new Response($this->getBody($request, $file)))
                ->withHeader('Content-type', $this->getMimetype($request, $file))
                ->withHeader('Content-Range', $this->getRange($request, $file));
        }

        // Otherwise, just delegate to the next middleware
        return $delegate->process($request);
    }

    /**
     * Get a mimetype for a fileinfo object
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \SplFileInfo $file
     * @return string
     */
    protected function getMimetype(ServerRequestInterface $request, SplFileInfo $file): string
    {
        // Determine the system reported file type
        $mimeType = \mime_content_type($file->getPathname());

        // Normalize SVG types
        if ('svg' === $file->getExtension()) {
            $mimeType = 'image/svg+xml'; // People don't use <?xml.. anymore :(
        }

        if ('js' === $file->getExtension()) {
            $mimeType = 'application/javascript';
        }

        return $mimeType;
    }

    /**
     * Get the response range for a requested file
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \SplFileInfo $file
     * @return string
     */
    protected function getRange(ServerRequestInterface $request, SplFileInfo $file): string
    {
        // Get the requested range
        $range = $request->getHeaderLine('range');
        $range = str_replace('=', ' ', $range);

        // Add the total size of the file
        $range .= '/ ' . $file->getSize();

        return $range;
    }

    /**
     * Get the response body for a requested file
     *
     * @param SplFileInfo $file
     * @return StreamInterface
     */
    protected function getBody(ServerRequestInterface $request, SplFileInfo $file): StreamInterface
    {
        // Get a simple stream from the file
        return new Stream($file->getPathname());
    }
}
