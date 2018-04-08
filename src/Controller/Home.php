<?php

namespace CascadiaPHP\Site\Controller;

use CascadiaPHP\Site\Uri\UriResolver;
use League\Plates\Template\Template;
use Psr\Http\Message\ResponseInterface;
use Spatie\SchemaOrg\Schema;

class Home extends Controller
{

    protected $cssPath = '/css/pages/home.css';

    /**
     * The main entry point for viewing the homepage
     * @param \CascadiaPHP\Site\Uri\UriResolver $uri
     * @return ResponseInterface
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function view(UriResolver $uri): ResponseInterface
    {
        // Handle setting the schema
        $this->setSchema($this->schema($uri));

        // Set general SEO stuff
        $this->seo()
            ->addImages($uri->relativeSchemaTo('/images/opengraph/main-banner.png'))
            ->setTitle('Cascadia PHP Conference held in Portland Oregon 2018')
            ->setDescription('Cascadia PHP is a non-profit community driven conference in the Pacific Northwest that ' .
                'is focused on PHP. In September 2018 it will be held in Portland Oregon, and will host dozens of ' .
                'speakers from around the world!');

        // Set opengraph specific stuff
        $this->seo()->opengraph()
            ->setUrl($uri->to('/'))
            ->setType('website')
            ->setSiteName('Cascadia PHP');

        // Set metatag specific stuff
        $this->seo()->metatags()
            ->setKeywords([
                'portland',
                'portland or',
                'portland usa',
                'php conference',
                'php 2018',
                'php conference 2018',
                'php developer',
                'web developer',
                'wordpress developer',
                'concrete5 developer',
                'drupal developer',
                'joomla developer'
            ]);

        return $this->render('/pages/home');
    }

    protected function schema(UriResolver $uri)
    {
        $timezone = new \DateTimeZone('PST');
        $startDate = new \DateTime('September 14th 2018', $timezone);
        $enddate = new \DateTime('September 15th 2018', $timezone);

        $blindBirdStarts = new \DateTime('April 15th 2018', $timezone);
        $earlyBirdStarts = new \DateTime('June 15th 2018', $timezone);
        $generalAdmissionStarts = new \DateTime('August 15th 2018', $timezone);

        /** The default site schema */
        return Schema::educationEvent()
            ->name('Cascadia PHP')
            ->image($uri->relativeSchemaTo('/images/opengraph/main-banner.png'))
            ->description(
                'A PHP conference in the heart of Portland Oregon'
            )
            ->startDate($startDate)
            ->endDate($enddate)
            ->location(
                Schema::place()
                    ->name('University Place Hotel')
                    ->address(
                        Schema::postalAddress()
                            ->streetAddress('310 SW Lincoln St')
                            ->addressLocality('Portland')
                            ->addressRegion('OR')
                            ->addressCountry('US')
                            ->postalCode('97201')
                    )
                    ->telephone('(503) 221-0140')
            )
            ->organizer([
                Schema::organization()
                    ->name('PHPDX')
                    ->description('Portland\'s PHP User Group'),
                Schema::organization()
                    ->name('Cascadia PHP INC.')
                    ->description('A non-profit organization put together to run a PHP event in Portland, Oregon'),
                Schema::person()
                    ->givenName('Alena')->familyName('Holligan')
                    ->jobTitle('President of Cascadia PHP INC'),
                Schema::person()
                    ->givenName('Kevin')->familyName('DeCapite')
                    ->jobTitle('Vice President of Cascadia PHP INC'),
                Schema::person()
                    ->givenName('Melinda')->familyName('Serven')
                    ->jobTitle('Treasurer'),
                Schema::person()
                    ->givenName('Korvin')->familyName('Szanto')
                    ->jobTitle('Secretary'),
                Schema::person()
                    ->givenName('Daniele')->familyName('Grillenzoni'),
                Schema::person()
                    ->givenName('Kurtis')->familyName('Holsapple')
            ])
            ->sponsor([
                //Schema::organization()->name('ACME Inc')
            ])
            ->performers([
                /* Schema::person()
                     ->name('Korvin Szanto')
                     ->image('https://avatars3.githubusercontent.com/u/1007419?s=460&v=4')
                */
            ])
            ->offers([
                /*Schema::offer()
                    ->name('Blind Bird')
                    ->availabilityStarts($blindBirdStarts)
                    ->availabilityEnds($earlyBirdStarts)
                Schema::offer()
                    ->name('Early Bird')
                    ->availabilityStarts($earlyBirdStarts)
                    ->availabilityEnds($generalAdmissionStarts),
                Schema::offer()
                    ->name('General Admission')
                    ->availabilityStarts($generalAdmissionStarts)*/
            ]);
    }
}
