<?php
/**
 * @var \League\Plates\Template\Template $this
 * @var \PHPDX\Site\Meetup\Event[] $events
 */
$this->layout('layout');
$limit = $limit ?? 100;

?>
<h3>Upcoming Events</h3>
<?php
$this->insert('events/list', [
    'eventList' => $eventList
]);
