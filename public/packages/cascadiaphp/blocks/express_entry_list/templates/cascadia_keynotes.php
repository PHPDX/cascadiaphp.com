<?php defined('C5_EXECUTE') or die('Access Denied.');

$c = Page::getCurrentPage();
$app = \Concrete\Core\Support\Facade\Application::getFacadeApplication();

$results = $result->getItemListObject()->getResults();
?>

<div class="speakers flex-row flex flex-wrap text-white">
    <?php
    if (count($results)) {
        /** @var \Concrete\Core\Express\Entry\Search\Result\Item $item */
        foreach ($result->getItems() as $item) {
            $talk = $item->getEntry();
            $speaker = $talk->getSpeaker();
            $twitter = $speaker->getTwitterHandle();
            ?>
            <div class="m2 speaker" style="flex: 1 1 0;">
                <div class="avatar circle shadow-lg" style="flex: 1; display: inline-block">
                    <img src="<?= $speaker->getAvatar()->getRelativePath() ?>" />
                </div>

                <div class="details text-center">
                    <div class="name">
                        <?= $speaker->getFirstName() . ' ' . $speaker->getLastName() ?>
                    </div>
                    <div class="twitter">
                        <a href="https://twitter.com/<?= $twitter ?>">
                            @<?= $twitter ?>
                        </a>
                    </div>

                    <?php
                    if ($company = $speaker->getCompany()) {
                        ?>
                        <div class="company bg-white c-blue-dark" style="font-size: .75em">
                            <?= $company ?>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="talk" style="">
                        <?= $talk->getTalkTitle() ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
