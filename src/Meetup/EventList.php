<?php

namespace PHPDX\Site\Meetup;

use DMS\Service\Meetup\AbstractMeetupClient;
use Psr\SimpleCache\CacheInterface;

class EventList
{

    /** @var string Cache keys */
    protected $eventCacheKey = 'events';

    /** @var int The cache ttl */
    protected $ttl = 500;

    /** @var \Psr\SimpleCache\CacheInterface */
    protected $cache;

    /** @var \PHPDX\Site\Meetup\EventFactory */
    protected $factory;

    /** @var \DMS\Service\Meetup\AbstractMeetupClient */
    protected $meetup;

    public function __construct(CacheInterface $cache, EventFactory $factory, AbstractMeetupClient $client)
    {
        $this->cache = $cache;
        $this->factory = $factory;
        $this->meetup = $client;
    }

    /**
     * @return \Generator|Event[]
     */
    public function events()
    {
        $events = $this->cache->get($this->eventCacheKey, $this);

        // If we get the default value back
        if ($events === $this && $events = iterator_to_array($this->resolveEvents())) {
            $this->cache->set($this->eventCacheKey, $events, $this->ttl);
        }

        foreach ($events as $event) {
            yield $this->factory->fromResponse($event);
        }
    }

    /**
     * Announced events
     * @return \Generator|\PHPDX\Site\Meetup\Event[]
     */
    public function announced()
    {
        foreach ($this->events() as $event) {
            if ($event->isAnnounced()) {
                yield $event;
            }
        }
    }

    /**
     * @return \Generator|array[]
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function resolveEvents()
    {
        try {
            $events = $this->getEventsFromMeetup();
        } catch (\Exception $e) {
            $events = [];
        }

        foreach ($events as $event) {
            yield $event;
        }
    }

    /**
     * Get the meetup event list
     * @param $groupId
     * @return \DMS\Service\Meetup\Response\MultiResultResponse
     */
    protected function getEventsFromMeetup()
    {
        return $this->meetup->getEvents([
            'group_urlname' => 'pdx-php'
        ]);
    }

}
