<?php

namespace PHPDX\Site\Meetup;

use DMS\Service\Meetup\AbstractMeetupClient;
use Psr\SimpleCache\CacheInterface;

class EventList
{

    /** @var \Psr\SimpleCache\CacheInterface  */
    private $cache;

    /** @var \PHPDX\Site\Meetup\EventFactory  */
    private $factory;

    /** @var \DMS\Service\Meetup\AbstractMeetupClient  */
    private $meetup;

    public function __construct(CacheInterface $cache, EventFactory $factory, AbstractMeetupClient $client)
    {
        $this->cache = $cache;
        $this->factory = $factory;
        $this->meetup = $client;
    }

    public function events()
    {
        $events = $this->cache->get('events', $this);

        // If we get the default value back
        if ($events === $this) {
            $events = iterator_to_array($this->resolveEvents());
            $this->cache->set('events', $events, 60);
        }

        foreach ($events as $event) {
            yield $this->factory->fromResponse($event);
        }
    }

    private function resolveEvents()
    {
        $meetup = $this->meetup->getGroup(['urlname' => 'PDX-PHP']);
        $id = $meetup->getData()['id'];

        $events = $this->meetup->getEvents([
            'group_id' => $id
        ]);

        foreach ($events as $event) {
            yield $event;
        }
    }

}
