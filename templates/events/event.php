<?php
/**
 * @var \PHPDX\Site\Meetup\Event $event
 * @var \PHPDX\Site\Template\Template $this
 */
?>

<div class="event-box">
    <div class="row meta">
        <div class="col-3 name">
            <a href="<?= $event->getUrl() ?>">
            <?= $this->e($event->getName()) ?>
            </a>
        </div>
        <div class="col-6 center where">
            <?php
            $location = $event->getVenue();
            ?>
            <span class="address"><?= $this->e($location['address_1'] ?? 'Unkown Address') ?></span>,
            <span class="city"><?= $this->e($location['city'] ?? 'Unkown Address') ?></span>
            <span class="state"><?= $this->e($location['state'] ?? 'Unkown Address') ?></span>,
            <span class="country"><?= $this->e($location['localized_country_name'] ?? 'Unkown Address') ?></span>
        </div>
        <div class="col-6 center when">
            <span class="time"><?= $this->e($this->time()->when($event->getTime())) ?></span>
        </div>
    </div>
    <?php
    if ($directions = $event->getDirections()) {
        ?>
        <div class="row center">
            <div class="col-12 directions">
                <?= $this->e($event->getDirections()) ?>
            </div>
        </div>
        <?php
    }
    ?>

    <div class="row">
        <div class="col-12 what">
            <p>
                <?= $event->getDescription() ?>
            </p>
        </div>
    </div>
</div>
<?= $this->insert('events/structured', $this->data());
