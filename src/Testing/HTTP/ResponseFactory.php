<?php

namespace CascadiaPHP\Site\Testing\HTTP;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class ResponseFactory implements \Http\Message\ResponseFactory
{

    /**
     * Creates a new PSR-7 response.
     *
     * @param int $statusCode
     * @param string|null $reasonPhrase
     * @param array $headers
     * @param resource|string|StreamInterface|null $body
     * @param string $protocolVersion
     *
     * @return ResponseInterface
     */
    public function createResponse(
        $statusCode = 200,
        $reasonPhrase = null,
        array $headers = [],
        $body = null,
        $protocolVersion = '1.1'
    ) {

    }
}
