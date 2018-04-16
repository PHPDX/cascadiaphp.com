<?php

namespace CascadiaPHP\Site\Testing;

use CascadiaPHP\Site\Testing\HTTP\MockClient;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Uri;

class TestCase extends PHPUnitTestCase
{

    use MockeryPHPUnitIntegration;

    protected $httpClient;

    protected function get(string $path, array $data = [])
    {
        return $this->request('get', $path, $data);
    }

    protected function post(string $path, array $data = [])
    {
        return $this->request('post', $path, $data);
    }

    protected function request(string $method, string $path, array $data = [])
    {
        $method = strtoupper($method);

        if (!\in_array($method, ['GET', 'POST'], true)) {
            throw new \InvalidArgumentException('Only "get" and "post" requests are allowed.');
        }
        $request = ServerRequestFactory::fromGlobals(
            [
                'SERVER_NAME' => 'test.com',
                'SERVER_PORT' => 443,
                'HTTPS' => 'on',
                'REQUEST_URI' => '/' . ltrim($path, '/')
            ],
            $method === 'GET' ? $data : [],
            $method === 'POST' ? $data : null,
            [],
            []);

        // Send that request
        return $this->sendRequest($request);
    }

    /**
     * Handle testing server requests
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \CascadiaPHP\Site\Testing\HTTP\MockResponse|mixed|null|\Psr\Http\Message\ResponseInterface
     */
    protected function sendRequest(ServerRequestInterface $request)
    {
        if (!$this->httpClient) {
            $this->httpClient = new MockClient();
        }

        return $this->httpClient->sendRequest($request, $this);
    }

    protected function assertBetween($start, $end, $actual, string $message = '')
    {
        if ($message === '') {
            $message = sptintf('Expected a number between %d and %d. Got %d', $start, $end, $actual);
        }

        $this->assertThat($actual, static::greaterThanOrEqual($start), $message);
        $this->assertThat($actual, static::lessThanOrEqual($end), $message);
    }

    public function addSuccessfulAssert(string $message = '')
    {
        $this->assertTrue(true, $message);
    }

}
