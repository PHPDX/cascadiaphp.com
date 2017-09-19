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
</div>
<h2 class="center">Our Sponsors</h2>
<div class="sponsorband">
    <?= $this->markdown('sponsors') ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h3 class="center">Next Event</h3>
            <?php
            $this->insert('events/list', [
                'eventList' => $eventList,
                'limit' => 1,
                'small' => true
            ]);
            ?>
        </div>
        <div class="col-6">
            <h3 class="center">Last Event</h3>
            <?php
            $this->insert('events/list', [
                'eventList' => $pastEventList,
                'limit' => 1,
                'small' => true
            ]);
            ?>
        </div>
    </div>
    <div class="spacer" style="height:50px"></div>
