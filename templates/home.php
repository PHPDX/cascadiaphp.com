<?php
/** @var \PHPDX\Site\Template\Template $this */
$this->layout('layout', [
    'title' => 'PDXPHP Usergroup',
    'nologo' => true,
    'active' => '/'
]);
?>

<div class="row">
    <div class="col-12 center">
        <div class="logo img center">
            <img src="/images/logo.svg">
        </div>
        <p><?= $this->markdown('mission') ?></p>
    </div>
</div>

<div class="center">
    <h3>Next Event</h3>
</div>
<?php
$this->insert('events/list', [
    'eventList' => $eventList,
    'limit' => 1
]);
?>
