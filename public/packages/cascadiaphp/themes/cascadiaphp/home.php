<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Core\View\View $view */
$view = $view ?? null;
/** @var \Concrete\Core\Page\Page $c */
$c = $c ?? null;
?>
<?php $view->requireAsset('css', 'cp/home') ?>
<?php $view->inc('elements/header.php') ?>

<div class="cp-subheader cp-row <?= $c->isEditMode() ? 'cp-subheader-editmode' : '' ?>">
    <div class="cp-background-cover"></div>
    <div class="cp-column center flex flex-column">
        <div class="cp-striped-image">
            <div class="cp-image-container">
                <?php area('Home Header Image', $c) ?>
            </div>
            <div class="cover"></div>
            <div class="cover-bottom"></div>
        </div>
        <div class="cp-subheader-content">
            <?= $view->inc('elements/footer_top.php') ?>

            <div class="cp-gravel-section cp-padded">
                <?= area('Home Header Gravel Section', $c) ?>
            </div>
        </div>
    </div>
</div>

<div class="cp-hangover cp-padded">
    <?= area('Home Overlay Content', $c) ?>
</div>

<div class="cp-content-section cp-row flex-grow">
    <div class="cp-column cp-padded">
        <?php area('Main', $c) ?>
    </div>
</div>

<div class="cp-row cp-who-is-row">
    <div class="cp-separator"></div>
    <div class="cp-column">
        <?= area('Who is Cascadia', $c) ?>
    </div>
</div>

<?php $view->inc('elements/footer.php') ?>
