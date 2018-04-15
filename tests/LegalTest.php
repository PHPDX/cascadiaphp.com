<?php

namespace CascadiaPHP\Tests;

use CascadiaPHP\Site\Testing\HTTP\MockResponse;
use CascadiaPHP\Site\Testing\PageTestCase;
use Zend\Diactoros\Response\RedirectResponse;

class LegalTest extends PageTestCase
{

    public function testParentPageRedirects()
    {
        $this->get('/legal')
            ->shouldHaveCode(301)
            ->shouldContainHeader('location', '/legal/terms');
    }

    public function testCoCRendersAsExpected(): void
    {
        $this->get('/legal/coc')
            ->shouldBeAMP()
            ->shouldSucceed()
            ->shouldContainSelector('.main-content a[href="/legal/terms"]', 'COC should link to the terms');
    }

    public function testTermsRendersAsExpected(): void
    {
        $this->get('/legal/terms')
            ->shouldBeAMP()
            ->shouldSucceed()
            ->shouldContainSelector('.main-content a[href="/legal/coc"]', 'Terms should link to the CoC');
    }


    /**
     * Generate a response for the page we're testing here. This should be something like `return $this->get('/page')`
     * Don't use this to access the response, instead use static::$response
     *
     * @return \CascadiaPHP\Site\Testing\HTTP\MockResponse
     */
    protected function requestPage(): ?MockResponse
    {
        return null;
    }
}
