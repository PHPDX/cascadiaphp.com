<?php
/**
 * @var \Concrete\Core\Entity\Express\Entry $talk
 * @var \Concrete\Core\Entity\Express\Entry $speaker
 */

use Michelf\Markdown;

$thumb = $speaker->getAvatar();
$type = strtolower(str_replace(' ', '-', $talk->getTalkType()));
$company = $speaker->getCompany();
$twitter = $speaker->getTwitterHandle();
$fullName = $speaker->getFirstName() . ' ' . $speaker->getLastName();
?>

<div class="modal fade speaker-modal talk-<?= $type ?>" id="talkModal<?= $talk->getID() ?>" tabindex="-1" role="dialog" style="display:none">
    <div class="modal-dialog shadow-lg">
        <div class="modal-content">
            <div class="modal-close close-button px2 py1 c-white text-shadow" data-dismiss="modal">x</div>
            <div class="speaker-header flex">
                <img class="flex-1" src="<?= $thumb->getRelativePath() ?>"/>
                <div class="flex-1 speaker-details flex justify-content-center">
                    <div class="text-center pt2 flex flex-column flex-grow align-self-center">
                        <span class="light-text block nowrap"><?= $fullName ?></span>
                        <?php
                        if ($company) {
                            ?>
                            <span class="company light-text block nowrap rounded mx1 my1 overflow-hidden bg-blue white px2"><?= $company ?></span>
                            <?php
                        }

                        if ($twitter) {
                            ?>
                            <a href="https://twitter.com/@<?= $twitter ?>"
                               class="twitter block nowrap rounded mx1 my1 overflow-hidden white px2">
                                @<?= $twitter ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="speaker-tabs">
                <ul class="nav nav-tabs nav-tabs-fillup" role="tablist">
                    <li class="nav-item">
                        <a data-toggle="tab" class="active nav-link " href=".modal.show .speaker-description"><span>Talk Info</span></a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" class="nav-link" href=".modal.show .speaker-bio"><span>Bio</span></a>
                    </li>
                </ul>
            </div>
            <div class="speaker-content tab-content p2">
                <div role="tabpanel" class="tab-pane active speaker-description">
                    <h5><?= $talk->getTalkTitle() ?></h5>
                    <?= trim(Markdown::defaultTransform($talk->getTalkDescription())) ?: 'Description coming soon.' ?>
                </div>
                <div role="tabpanel" class="tab-pane speaker-bio">
                    <h5><?= $fullName ?></h5>
                    <?= trim(Markdown::defaultTransform($speaker->getBio())) ?: 'Speaker Bio coming soon.' ?>
                </div>
            </div>
        </div>
    </div>
</div>
