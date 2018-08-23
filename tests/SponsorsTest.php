<?php

namespace CascadiaPHP\Tests;

use CascadiaPHP\Site\Testing\HTTP\MockResponse;
use CascadiaPHP\Site\Testing\PageTestCase;

class SponsorsTest extends PageTestCase
{
    public function testPageRendersAsExpected(): void
    {
        $this->getResponse()
            ->shouldSucceed()
            ->shouldHaveCanonicalUrl('/sponsors')
            ->shouldContainSelector('.btn-cta');
    }

    public function testThatSponsorsExist(): void
    {
        $sponsors = [
            'platinum' => [
                'concrete5',
            ],
            'gold' => [
                'Twilio',
            ],
            'silver' => [
                'OSMI',
            ],
            'bronze' => [
                'MySQL',
            ],
            'copper' => [
                'API-City'
            ]
        ];

        $response = $this->getResponse();

        foreach ($sponsors as $level => $bag) {
            foreach ($bag as $sponsor) {
                $response->shouldContainSelector(".{$level} [alt='{$sponsor}']", "Couldn't find sponsor '{$sponsor}' in level '{$level}'");
            }
        }
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
        return $this->get('/sponsors');
    }
}
