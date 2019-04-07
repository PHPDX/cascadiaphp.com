<?php defined('C5_EXECUTE') or die('Access Denied.') ?>
<?php $view->requireAsset('css', 'cp/inner') ?>
<?php $view->inc('elements/header.php') ?>

<div class="cp-subheader cp-row">
    <div class="cp-column center">
        <div class="cp-striped-image">
            <div class="cp-image-container">
                <?php (new Area('Subheader'))->display($c) ?>
            </div>
            <div class="cover"></div>
            <div class="cover-bottom"></div>
        </div>
        <div class="cp-subheader-title">
            <span><?= $c->getCollectionName() ?></span>
        </div>
    </div>
</div>

<div class="cp-content-section cp-row flex-grow">
    <div class="cp-column cp-padded">
        <?php (new Area('Main'))->display($c) ?>
    </div>
</div>

<?php $view->inc('elements/footer.php') ?>
