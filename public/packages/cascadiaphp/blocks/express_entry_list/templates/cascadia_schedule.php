<?php use Carbon\Carbon;

defined('C5_EXECUTE') or die('Access Denied.');

$c = Page::getCurrentPage();
$app = \Concrete\Core\Support\Facade\Application::getFacadeApplication();

$results = $result->getItemListObject()->getResults();
?>

<div class="tab-header flex flex-row center">
    <div class="tab text-center flex-item flex-auto p2" role="tab" tabindex="0" data-day="thursday">
        Thursday the 19th
    </div>
    <div class="tab text-center flex-item flex-auto p2" role="tab" tabindex="0" data-day="friday">
        Friday the 20th
    </div>
    <div class="tab text-center flex-item flex-auto p2" on="tap:AMP.setState({day:'saturday'})" role="tab" tabindex="0" data-day="saturday">
        Saturday the 21st
    </div>
</div>
<div class="schedule mb2">
    <div class="schedule-day invisible" data-day="thursday">
        <h4 class="text-center mt3">Thursday</h4>
        <div class="title col-12 mx1 mt3">
            <span class="day float-right">Thursday</span>
            <span class="time">10am - 10pm</span>
        </div>
        <div class="schedule-row row clearfix flex flex-1 mx1 overflow-auto">
            <div class="event event py3 center col-12 mx1 dark shadow-md flex-1 text-center">
                Twilio Sponsored PHP for Good Hackathon <br><a class="btn btn-secondary" href="https://cascadiaphp2019.devpost.com/">Reserve your spot</a>
            </div>
        </div>
    </div>

    <?php
    if (count($results)) {
        $currentDay = null;
        /** @var \Concrete\Core\Express\Entry\Search\Result\Item $item */
        foreach ($result->getItems() as $item) {
            /** @var \Concrete\Core\Entity\Express\Entry $entry */
            $entry = $item->getEntry();

            // Load data from the item
            $talks = $entry->getTalks();
            $title = $entry->getSlotTitle();
            $type = strtolower((string) $entry->getSlotType());
            $start = Carbon::make($entry->getStart());
            $end = Carbon::make($entry->getEnd());

            // Normalize the dates into strings like 1am or 1:30am
            $startString = $start->format('g:ia');
            $endString = $end->format('g:ia');

            if ($start->minute === 0) {
                $startString = $start->format('ga');
            }

            if ($end->minute === 0) {
                $endString = $end->format('ga');
            }

            // Check which day we're on
            $day = Carbon::make($start)->englishDayOfWeek;

            // Next Day
            if ($day !== $currentDay) {
                // If we already had a day
                if ($currentDay) {
                    ?>
                    </div>
                    <?php
                }
                ?>
                <div class="schedule-day invisible" data-day="<?= strtolower($day) ?>">
                    <h4 class="text-center mt3">Registration</h4>
                    <div class="schedule-row row clearfix flex flex-1 mx1 overflow-auto">
                        <div class="event event py3 center col-12 mx1 dark shadow-md flex-1 text-center">
                            Registration Opens at 8:30am</div>
                    </div>
                    <h4 class="text-center"><?= $day ?></h4>
                    <div class="flex title text-center clearfix">
                        <div class="flex-1">Track 1</div>
                        <div class="flex-1">Track 2</div>
                        <div class="flex-1">Track 3</div>
                    </div>
                <?php
            }
            $currentDay = $day;
            ?>
            <div class="schedule-row row clearfix flex mx1 overflow-auto flex-column">
                <div class="title col-12 mx1 mt3">
                    <span class="day float-right"><?= $day ?></span>
                    <span class="time"><?= $startString ?> - <?= $endString ?></span>
                </div>
                <?php
                switch ($type) {
                    case 'keynote':
                        $talk = $talks[0] ?? null;
                        if (!$talk) {
                            echo "BROKEN TALK: " . $entry->getID();
                            break;
                        }
                        $speaker = $talk->getSpeaker();
                        ?>
                        <div role="button" tabindex="0" data-toggle="modal" data-target="#talkModal<?= $talk->getID() ?>" class="schedule-talk p1 flex keynote col-12" data-starts="<?= $start->toAtomString() ?>" data-ends="<?= $end->toAtomString() ?>">
                            <div class="rounded border col-12 center flex flex-1 flex-column align-items-center align-content-end p2 bg-white shadow-md">
                                <span class="font-weight-bolder"><?= $talk->getTalkTitle() ?></span>
                                <span class="text-truncate font-italic font-weight-light"><?= $speaker->getFirstName() ?> <?= $speaker->getLastName() ?></span>
                                <span>Track 1</span>
                            </div>
                        </div>
                        <?php
                        View::element('dialogs/speaker_info', ['talk' => $talk, 'speaker' => $speaker], 'cascadiaphp');
                        break;
                    case 'break':
                        ?>
                        <div class="event break py3 center col-12 mx1 dark shadow-md text-center">
                            <?= $title ?>
                        </div>
                        <?php
                        break;
                    case 'talk':
                        $i = 1;
                        ?>
                        <div class="flex talks-container">
                            <?php
                            /** @var \Concrete\Core\Entity\Express\Entry $talk */
                            foreach ($talks as $talk) {
                                $speaker = $talk->getSpeaker();
                                ?>
                                <div role="button" data-toggle="modal" data-target="#talkModal<?= $talk->getID() ?>" tabindex="0" class="schedule-talk p1 flex talk col" data-starts="<?= $start->toAtomString() ?>" data-ends="<?= $end->toAtomString() ?>">
                                    <div class="rounded border flex-1 center flex flex-column align-items-center justify-content-center text-center p2 bg-white shadow-md">
                                        <span class="font-weight-bolder my1"><?= $talk->getTalkTitle() ?></span>
                                        <span class="text-truncate font-italic font-weight-light px1" style="justify-self: flex-end"><?= $speaker->getFirstName() ?> <?= $speaker->getLastName() ?></span>
                                        <span>Track <?= $i++ ?></span>
                                    </div>
                                </div>
                                <?php
                                View::element('dialogs/speaker_info', ['talk' => $talk, 'speaker' => $speaker], 'cascadiaphp');
                            }
                            ?>
                        </div>
                        <?php
                        break;
                }
                ?>
            </div>
            <?php
        }
    }
    ?>
</div>


<script>
    (function() {
        const tabs = $('.tab')
        const screens = $('.schedule-day')
        tabs.click(function() {
            const me = $(this)
            const selected = tabs.filter('.selected')

            // If we're already selected
            if (me.hasClass('selected')) {
                return
            }

            selected.removeClass('selected')
            me.addClass('selected')
            screens.not('[data-day=' + me.data('day') + ']').addClass('invisible')
            screens.filter('[data-day=' + me.data('day') + ']').removeClass('invisible')
        })

        const now = new Date()
        if (now.getMonth() === 8 && now.getFullYear() === 2019 && now.getDate() === 21) {
            tabs.filter('[data-day=saturday]').click()
        } else {
            tabs.filter('[data-day=friday]').click()
        }
    }());
</script>
