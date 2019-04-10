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

<?php
$slickConfig = [
    'slidesToShow' => 4,
    'slidesToScroll' => 1,
    'prevArrow' => '<div class="cp-previous"><i class="material-icons md-48">navigate_before</i></div>',
    'nextArrow' => '<div class="cp-next"><i class="material-icons md-48">navigate_next</i></div>',
];
?>

<div class="cp-content-section cp-row flex-auto">
    <div class="cp-column cp-padded cp-slideshow cp-padded not-loaded" data-slick='<?= json_encode($slickConfig) ?>'>
        <?php area('Slideshow', $c, '<div class="mx1">', '</div>') ?>
    </div>
</div>

<div class="cp-row cp-who-is-row clearfix">
    <div class="cp-separator"></div>
    <div class="cp-column">
        <?= area('Who is Cascadia', $c) ?>
    </div>
</div>

<?php $view->inc('elements/footer.php') ?>
<?php if (!$c->isEditMode()): ?>

    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css"/>
    <script>
        (function() {
            $('[data-slick]').slick().removeClass('not-loaded')
        })()
    </script>
<?php else: ?>
    <script>
        (function() {
            $('[data-slick]').removeClass('not-loaded').addClass('edit-mode')
        })()
    </script>
<?php endif; ?>
