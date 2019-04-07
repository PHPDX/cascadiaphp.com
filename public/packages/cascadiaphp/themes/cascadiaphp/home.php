<?php defined('C5_EXECUTE') or die('Access Denied.') ?>
<?php $view->requireAsset('css', 'cp/home') ?>
<?php $view->inc('elements/header.php') ?>

<?php (new Area('Main'))->display($c) ?>

<?php $view->inc('elements/footer.php') ?>
