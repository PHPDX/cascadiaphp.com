<?php defined('C5_EXECUTE') or die('Access Denied.') ?>
<div class="cp-footer-top cp-row">
    <div class="cp-footer-top-container flex cp-column cp-padded">
        <div class="flex-auto cp-footer-top-left">
            <div class="cp-footer-top-top-content">
                <span>THE OFFICIAL</span>
                <span>2019 PHP Conference</span>
            </div>
            <div class="cp-footer-top-bottom-content">
                <span>OF THE PACIFIC NORTHWEST</span>
                <span>Portland, OR</span>
            </div>
        </div>
        <div class="flex-auto cp-footer-top-oregon">
            <?= (new GlobalArea('Footer Oregon'))->display() ?>
        </div>
    </div>
</div>

<div class="cp-fotter-bottom cp-row flex flex-column">
    <div class="cp-fotter-bottom-container flex cp-column cp-padded">
        <div class="flex-1 flex flex-column">
            <div class="cp-short-container">
                <div class="copyright">&copy; <?= date('Y') ?> Cascadia PHP Inc. All rights reserved.</div>
                <div class="credit">Designed &amp; Built by Cascadia PHP.</div>
            </div>
        </div>
        <div class="flex-1 flex flex-column cp-footer-logo">
            <?= (new GlobalArea('Footer Logo'))->display() ?>
        </div>
        <div class="flex-1 flex flex-column cp-footer-pagelist">
            <div class="cp-short-container">
                <?= (new GlobalArea('Footer PageList'))->display() ?>
            </div>
        </div>
    </div>
    <div class="cp-footer-social cp-column cp-padded">
        <?= (new GlobalArea('Footer Social'))->display() ?>
    </div>
</div>
</div>
</div>

<?php $this->inc('elements/footer_bottom.php') ?>
