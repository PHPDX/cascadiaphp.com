<?php
/**
 * @var \PHPDX\Site\Meetup\Event $event
 * @var \League\Plates\Template\Template $this
 */
?>

<div class="event-box">
    <div class="row meta">
        <div class="col-3 name">
            <?= $this->e($event->getName()) ?>
        </div>
        <div class="col-5 center where">
            <?php
            $location = $event->getVenue();
            ?>
            <span class="address"><?= $this->e($location['address_1' ?? 'Unkown Address']) ?></span>,
            <span class="city"><?= $this->e($location['city' ?? 'Unkown Address']) ?></span>
            <span class="state"><?= $this->e($location['state' ?? 'Unkown Address']) ?></span>,
            <span class="country"><?= $this->e($location['localized_country_name' ?? 'Unkown Address']) ?></span>
        </div>
        <div class="col-4 right when">
            <span class="time"><?= $this->e($event->getTime()->format('F jS Y \a\t g:i A')) ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-12 what">
            <p>
                <?= $event->getDescription() ?>
            </p>
        </div>
    </div>
</div>
