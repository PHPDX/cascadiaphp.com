<?php
/**
 * @var \PHPDX\Site\Template\Template $this
 * @var \PHPDX\Site\Meetup\EventList $eventList
 * @var int $limit
 */
$limit = $limit ?? 100;
foreach ($eventList->announced() as $event) {
    if (!$limit--) {
        break;
    }

    $this->insert('events/event', ['event' => $event]);
}
