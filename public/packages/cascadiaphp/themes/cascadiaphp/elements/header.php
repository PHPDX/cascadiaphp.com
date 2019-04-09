<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Core\View\View $view */
$view = $view ?? null;
/** @var \Concrete\Core\Page\Page $c */
$c = $c ?? null;
?>
<?php $view->inc('elements/header_top.php') ?>

<div class="main-wrapper <?= $c->getPageWrapperClass() ?>">

    <div class="cp-site">
        <div class="cp-header-content">
            <div class="cp-header-container">
                <div class="cp-header-left">
                    <?= globalArea('Header Left', $c) ?>
                </div>
                <div class="cp-header-right">
                    <nav class="d-lg-flex d-none">
                        <?= globalArea('Header Right', $c) ?>
                    </nav>
                    <a href="javascript:void" class="hamburger d-lg-none d-inline-block"></a>
                </div>
            </div>
            <div class="cp-separator"></div>
        </div>
        <div class="cp-hamburger hidden d-lg-none cp-padded">
            <?= globalArea('Header Mobile', $c) ?>
        </div>

        <script>
            (function() {
                $('.hamburger').on('click', function() {
                    $('.cp-hamburger').toggleClass('hidden')
                })
            }());
        </script>
