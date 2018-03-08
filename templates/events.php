<?php
/**
 * @var \CascadiaPHP\Site\Template\Template $this
 * @var \CascadiaPHP\Site\Meetup\Event[] $events
 */
$this->layout('layout', [
    'title' => 'Upcoming Events',
    'active' => '/events'
]);
$limit = $limit ?? 100;

?>
<h3>Announced Events</h3>
<?php
$this->insert('events/list', [
    'eventList' => $eventList
]);
