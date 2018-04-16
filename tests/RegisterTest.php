<?php

namespace CascadiaPHP\Tests;

use CascadiaPHP\Site\Testing\HTTP\MockResponse;
use CascadiaPHP\Site\Testing\PageTestCase;

class RegisterTest extends PageTestCase
{
    public function testPageRendersAsExpected(): void
    {
        $this->getResponse()
            ->shouldSucceed()
            ->shouldContainSelector('.btn-cta')
            ->shouldHaveCanonicalUrl('/register')
            ->shouldContainSelector('form', 'The register page should have a form on it');
    }

    public function testPageIsValidAmp(): void
    {
        $this->getResponse()
            ->shouldBeAMP();
    }

    /**
     * Generate a response for the page we're testing here. This should be something like `return $this->get('/page')`
     * Don't use this to access the response, instead use static::$response
     *
     * @return \CascadiaPHP\Site\Testing\HTTP\MockResponse
     */
    protected function requestPage(): MockResponse
    {
        return $this->get('/register');
    }
}
