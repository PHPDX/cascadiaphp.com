<?php

namespace CascadiaPHP\Site\Schema;

use CascadiaPHP\Site\Uri\UriResolver;
use Spatie\SchemaOrg\ItemAvailability;
use Spatie\SchemaOrg\Offer;
use Spatie\SchemaOrg\Schema;

class EventSchema extends Offer
{

    public static function create(UriResolver $uri)
    {
        $timezone = new \DateTimeZone('PST');
        $startDate = new \DateTime('September 19th 2019', $timezone);
        $endDate = new \DateTime('September 21th 2019', $timezone);

        //$blindBirdStarts = new \DateTime('April 15th 2018', $timezone);
        //$earlyBirdStarts = new \DateTime('June 10th 2018', $timezone);
        //$generalAdmissionStarts = new \DateTime('August 1st 2018', $timezone);

        /** The default site schema */
        return Schema::educationEvent()
            ->name('Cascadia PHP')
            ->image($uri->relativeSchemaTo('/images/opengraph/main-banner.png'))
            ->description(
                'A PHP conference in the heart of Portland Oregon'
            )
            ->startDate($startDate)
            ->endDate($endDate)
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
            ]);
        /**
            ->offers([
                Schema::offer()
                    ->name('Blind Bird')
                    ->price(175)
                    ->priceCurrency('USD')
                    ->validFrom($blindBirdStarts)
                    ->validThrough($earlyBirdStarts)
                    ->availability('In stock')
                    ->url($uri->relativeSchemaTo('/register')),
                Schema::offer()
                    ->name('Early Bird')
                    ->price(225)
                    ->priceCurrency('USD')
                    ->validFrom($earlyBirdStarts)
                    ->validThrough($generalAdmissionStarts)
                    ->availability('In stock')
                    ->url($uri->relativeSchemaTo('/register')),
                Schema::offer()
                    ->name('General Admission')
                    ->price(275)
                    ->priceCurrency('USD')
                    ->validFrom($generalAdmissionStarts)
                    ->availability('In stock')
                    ->url($uri->relativeSchemaTo('/register'))
            ]);
         */
    }

}
