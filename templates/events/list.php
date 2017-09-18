<?php
/**
 * @var \League\Plates\Template\Template $this
 * @var \PHPDX\Site\Meetup\EventList $eventList
 * @var int $limit
 */
$limit = $limit ?? 100;
foreach ($eventList->events() as $event) {
    if (!$limit--) {
        break;
    }
    if ($event->isAnnounced()) {
        $this->insert('events/event', ['event' => $event]);
    }
}
