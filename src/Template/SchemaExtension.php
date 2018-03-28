<?php

namespace CascadiaPHP\Site\Template;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Spatie\SchemaOrg\Schema;

class SchemaExtension implements ExtensionInterface
{

    public function register(Engine $engine)
    {
        $engine->registerFunction('schema', [$this, 'schemaFactory']);
    }

    public function schemaFactory()
    {
        $timezone = new \DateTimeZone('PST');
        $startDate = new \DateTime('September 15th 2018', $timezone);
        $enddate = new \DateTime('September 16th 2018', $timezone);

        $blindBirdStarts = new \DateTime('April 15th 2018', $timezone);
        $earlyBirdStarts = new \DateTime('June 15th 2018', $timezone);
        $generalAdmissionStarts = new \DateTime('August 15th 2018', $timezone);

        /** The default site schema */
        return Schema::educationEvent()
            ->name('Cascadia PHP')
            ->description(
                'A PHP conference in the heart of Portland Oregon'
            )
            ->alternateName('PNWPHP')
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
            ->organizer(
                Schema::organization()
                    ->name('PHPDX')
                    ->description('Portland\'s PHP User Group')
            )
            ->sponsor([
                Schema::organization()->name('ACME Inc')
            ])
            ->performers([
                Schema::person()
                    ->name('Korvin Szanto')
                    ->image('https://avatars3.githubusercontent.com/u/1007419?s=460&v=4')
            ])
            ->image('http://via.placeholder.com/350x150')
            ->offers([
                Schema::offer()
                    ->name('Blind Bird')
                    ->availabilityStarts($blindBirdStarts)
                    ->availabilityEnds($earlyBirdStarts),
                Schema::offer()
                    ->name('Early Bird')
                    ->availabilityStarts($earlyBirdStarts)
                    ->availabilityEnds($generalAdmissionStarts),
                Schema::offer()
                    ->name('General Admission')
                    ->availabilityStarts($generalAdmissionStarts)
            ]);
    }
}
