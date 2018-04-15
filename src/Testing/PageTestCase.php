<?php

namespace CascadiaPHP\Site\Testing;

use CascadiaPHP\Site\Testing\HTTP\MockResponse;

/**
 * Class PageTestCase
 * @package CascadiaPHP\Site\Testing
 */
abstract class PageTestCase extends TestCase
{

    protected static $response;

    /**
     * Generate a response for the page we're testing here. This should be something like `return $this->get('/page')`
     * Don't use this to access the response, instead use static::$response
     *
     * @return \CascadiaPHP\Site\Testing\HTTP\MockResponse
     */
    abstract protected function requestPage(): ?MockResponse;

    public function getResponse(): ?MockResponse
    {
        return static::$response;
    }

    /**
     * @before
     */
    public function prepareResponse(): void
    {
        if (!static::$response) {
            static::$response = $this->requestPage();
        }
    }

    /**
     * @afterClass
     */
    public static function removeResponse(): void
    {
        static::$response = null;
    }

}
