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
                    <?= (new GlobalArea('Header Left'))->display($c) ?>
                </div>
                <div class="cp-header-right">
                    <?= (new GlobalArea('Header Right'))->display($c) ?>
                </div>
            </div>
            <div class="cp-separator"></div>
        </div>

