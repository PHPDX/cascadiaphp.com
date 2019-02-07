<?php

namespace CascadiaPHP\Tests;

use CascadiaPHP\Site\Testing\HTTP\MockResponse;
use CascadiaPHP\Site\Testing\PageTestCase;

class ScheduleTest extends PageTestCase
{
    public function testPageRendersAsExpected(): void
    {
        $this->markTestSkipped("Schedule has been disabled");
        $this->getResponse()
            ->shouldSucceed()
            ->shouldHaveCanonicalUrl('/schedule')
            ->shouldContainSelector('.btn-cta');
    }

    public function testPageIsValidAmp(): void
    {
        $this->markTestSkipped("Schedule has been disabled");
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
        return $this->get('/schedule');
    }
}
