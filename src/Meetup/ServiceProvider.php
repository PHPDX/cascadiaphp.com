<?php

namespace PHPDX\Site\Meetup;

use DMS\Service\Meetup\AbstractMeetupClient;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        AbstractMeetupClient::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $this->container->add(AbstractMeetupClient::class, function() {
            return MeetupKeyAuthClient::factory([
                'key' => getenv('MEETUP_API_KEY')
            ]);
        });
    }
}
