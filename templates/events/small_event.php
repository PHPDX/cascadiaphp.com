<?php
/**
 * @var \CascadiaPHP\Site\Meetup\Event $event
 * @var \CascadiaPHP\Site\Template\Template $this
 */
?>

<div class="small-event-box">
    <div class="row meta">
        <div class="col-6-sm name"><a href="<?= $event->getUrl() ?>"><?= $this->e($event->getName()) ?></a></div>
        <div class="col-6-sm time right"><?= $this->e($this->time()->when($event->getTime())) ?></span></div>
    </div>
    <div class="row where">
        <div class="col-12">
            Venue:
            <?php
            $location = $event->getVenue();
            ?>
            <span class="address"><?= $this->e($location['address_1'] ?? 'Unkown Address') ?></span>,
            <span class="city"><?= $this->e($location['city'] ?? 'Unkown Address') ?></span>
            <span class="state"><?= $this->e($location['state'] ?? 'Unkown Address') ?></span>,
            <span class="country"><?= $this->e($location['localized_country_name'] ?? 'Unkown Address') ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 center attendees">
            <strong><?= $event->getAttendees() ?></strong>
            <?= $event->getAttendees() == 1 ? 'Developer Attendee' : 'Developer Attendees' ?>
        </div>
    </div>
    <?php
    if ($directions = $event->getDirections()) {
        ?>
        <div class="row center directions ">
            <div class="col-12">
                <?= $this->e($event->getDirections()) ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="row direction-spacer"></div>
        <?php
    }
    ?>
    <div class="row description">
        <div class="col-12">
            <?= $this->e(strip_tags($event->getDescription())) ?>
        </div>
    </div>
</div>
<?= $this->insert('events/structured', $this->data()) ?>
