<?php

namespace PHPDX\Site\Meetup;

use DMS\Service\Meetup\AbstractMeetupClient;
use Psr\SimpleCache\CacheInterface;

class EventList
{

    private $ttl = 500;

    /** @var \Psr\SimpleCache\CacheInterface */
    private $cache;

    /** @var \PHPDX\Site\Meetup\EventFactory */
    private $factory;

    /** @var \DMS\Service\Meetup\AbstractMeetupClient */
    private $meetup;

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
        $events = $this->cache->get('events', $this);

        // If we get the default value back
        if ($events === $this) {
            $events = iterator_to_array($this->resolveEvents());
            $this->cache->set('events', $events, $this->ttl);
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
     */
    private function resolveEvents()
    {
        try {
            $meetup = $this->cache->get('events', $this);
            if ($meetup === $this) {
                $meetup = $this->meetup->getGroup(['urlname' => 'PDX-PHP']);
                $this->cache->set('meetup', $meetup, $this->ttl);
            }
            $id = $meetup->getData()['id'];

            $events = $this->meetup->getEvents([
                'group_id' => $id
            ]);
        } catch (\Exception $e) {
            $events = [];
        }

        foreach ($events as $event) {
            yield $event;
        }
    }

}
