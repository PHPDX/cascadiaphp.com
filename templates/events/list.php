<?php
/**
 * @var \CascadiaPHP\Site\Template\Template $this
 * @var \CascadiaPHP\Site\Meetup\EventList $eventList
 * @var int $limit
 */
$limit = $limit ?? 100;
foreach ($eventList->announced() as $event) {
    if (!$limit--) {
        break;
    }

    $this->insert('events/' . ($small ?? false ? 'small_event' : 'event'), ['event' => $event]);
}
