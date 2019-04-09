<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Core\View\View $view */
$view = $view ?? null;
/** @var \Concrete\Core\Page\Page $c */
$c = $c ?? null;
?>

<div class="cp-footer-top cp-row shadow">
    <div class="cp-footer-top-container flex cp-column cp-padded">
        <div class="flex-auto cp-footer-top-left">
            <div class="cp-footer-top-top-content">
                <span>THE OFFICIAL</span>
                <span>2019 PHP Conference</span>
            </div>
            <div class="cp-footer-top-bottom-content text-lg-right">
                <span>OF THE PACIFIC NORTHWEST</span>
                <span>Portland, OR</span>
            </div>
        </div>
        <div class="flex-auto cp-footer-top-oregon">
            <?= globalArea('Footer Oregon', $c) ?>
        </div>
    </div>
</div>
