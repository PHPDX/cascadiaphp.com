<?php

namespace PHPDX\Site\Meetup;

use DMS\Service\Meetup\AbstractMeetupClient;
use Psr\SimpleCache\CacheInterface;

class PastEventList extends EventList
{

    protected $eventCacheKey = 'pastEvents';

    protected function getEventsFromMeetup()
    {
        $events = $this->meetup->getEvents([
            'status' => 'past',
            'group_urlname' => 'pdx-php',
            'time' => '-1m,0m'
        ]);

        return array_reverse($events->toArray());
    }

}
