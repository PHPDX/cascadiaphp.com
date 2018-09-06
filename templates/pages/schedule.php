<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php /** @var \CascadiaPHP\Site\Schedule\RowRenderer $renderer */ ?>

<?php

$this->start('components');
?>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>
<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<?php
$this->stop();
?>

<amp-state id="state">
    <script type="application/json">
        <?= json_encode($renderer->getData()) ?>
    </script>
</amp-state>

<h1 class="px3 my0 mb3 cubes pb2 pt3 border-bottom b2 b-gold bg-white darkblue">
    Schedule
</h1>

<div class="tab-header flex flex-row center">
    <div class='tab flex-item flex-auto selected border-top border-left border-right p2 col-6'
         [class]="'tab flex-item flex-auto border-top border-left border-right p2 col-6 ' + (day == 'friday' || !day ? 'selected' : '')"
         on="tap:AMP.setState({day:'friday'})">
        Friday the 14th
    </div>
    <div class='tab flex-item flex-auto border-top border-left border-right p2 col-6'
         [class]="'tab flex-item flex-auto border-top border-left border-right p2 col-6 ' + (day == 'saturday' ? 'selected' : '')"
         on="tap:AMP.setState({day:'saturday'})">
        Saturday the 15th
    </div>
</div>

<div class="schedule mb2">

    <!-- Friday -->
    <div class="schedule-day" [hidden]="day != 'friday'">

        <h3 class="center">Registration</h3>
        <?= $renderer->render(['event:Registration Opens at 8:30am']) ?>

        <h3 class="center">Friday</h3>
        <div class="row title center clearfix">
            <div class="col col-4">Track 1</div>
            <div class="col col-4">Track 2</div>
            <div class="col col-4">Track 3</div>
        </div>

        <?= $renderer->render(['title:friday:9am - 10am']) ?>
        <?= $renderer->render(['keynote:Learning']) ?>

        <?= $renderer->render(['title:friday:10am - 11am']) ?>
        <?= $renderer->render(['talk:composer', 'talk:secure', 'talk:bdd']) ?>

        <?= $renderer->render(['title:friday:11am - 11:30am']) ?>
        <?= $renderer->render(['break:Morning Break']) ?>

        <?= $renderer->render(['title:friday:11:30am - 12:30am']) ?>
        <?= $renderer->render(['talk:regex', 'talk:cli', 'talk:CQRS']) ?>

        <?= $renderer->render(['title:friday:12:30pm - 1:30pm']) ?>
        <?= $renderer->render(['break:Lunch']) ?>

        <?= $renderer->render(['title:friday:1:30pm - 2:30pm']) ?>
        <?= $renderer->render(['keynote:lost']) ?>

        <?= $renderer->render(['title:friday:2:30pm - 3:30pm']) ?>
        <?= $renderer->render(['talk:chair', 'talk:deploy', 'talk:scaled']) ?>

        <?= $renderer->render(['title:friday:3:30pm - 4pm']) ?>
        <?= $renderer->render(['break:Afternoon Break']) ?>

        <?= $renderer->render(['title:friday:4pm - 5pm']) ?>
        <?= $renderer->render(['short:tricks', 'short:building to spec', 'short:homestead', 'short:jenkins', 'short:encrypt', 'short:AWS']) ?>

        <?= $renderer->render(['title:friday:5pm - 6pm']) ?>
        <?= $renderer->render(['keynote:ethics']) ?>

        <?= $renderer->render(['title:friday:6pm']) ?>
        <?= $renderer->render(['event:🎉 Twilio Sponsored After Party 🎉']) ?>
    </div>

    <!-- Saturday -->
    <div class="schedule-day" [hidden]="day != 'saturday'">

        <h3 class="center">Registration</h3>
        <?= $renderer->render(['event:Registration Opens at 8:30am']) ?>

        <h3 class="center">Saturday</h3>
        <div class="row title center clearfix">
            <div class="col col-4">Track 1</div>
            <div class="col col-4">Track 2</div>
            <div class="col col-4">Track 3</div>
        </div>

        <?= $renderer->render(['title:saturday:9am - 10am']) ?>
        <?= $renderer->render(['keynote:helping']) ?>

        <?= $renderer->render(['title:saturday:10am - 11am']) ?>
        <?= $renderer->render(['talk:archetype', 'talk:refactor', 'talk:graphql']) ?>

        <?= $renderer->render(['title:saturday:11am - 11:30am']) ?>
        <?= $renderer->render(['break:Morning Break']) ?>


        <?= $renderer->render(['title:saturday:11:30am - 12:30pm']) ?>
        <?= $renderer->render(['talk:hero', 'talk:trend analysis', 'talk:going bare']) ?>

        <?= $renderer->render(['title:saturday:12:30pm - 1:30pm']) ?>
        <?= $renderer->render(['break:Lunch']) ?>

        <?= $renderer->render(['title:saturday:1:30pm - 2:30pm']) ?>
        <?= $renderer->render(['keynote:ally']) ?>

        <?= $renderer->render(['title:saturday:2:30pm - 3:30pm']) ?>
        <?= $renderer->render(['talk:stakeholder', 'talk:serverless', 'talk:symfony 4']) ?>

        <?= $renderer->render(['title:saturday:3:30pm - 4pm']) ?>
        <?= $renderer->render(['break:Afternoon Break']) ?>

        <?= $renderer->render(['title:saturday:4pm - 5pm']) ?>
        <?= $renderer->render(['talk:show', 'short:monster', 'short:code review', 'short:magento', 'short:mysql']) ?>


        <?= $renderer->render(['title:saturday:5pm - 6pm']) ?>
        <?= $renderer->render(['keynote:cal']) ?>

        <?= $renderer->render(['title:saturday:6pm']) ?>
        <?= $renderer->render(['event:🎉 concrete5 Sponsored Happy Hour 🎉']) ?>

    </div>
</div>

<?= $this->insert('fragment/speaker/modal') ?>
