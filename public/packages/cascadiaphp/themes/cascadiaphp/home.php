<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Core\View\View $view */
$view = $view ?? null;
/** @var \Concrete\Core\Page\Page $c */
$c = $c ?? null;
?>
<?php $view->requireAsset('css', 'cp/home') ?>
<?php $view->inc('elements/header.php') ?>

<?php (new \Concrete\Core\Area\Area('Main'))->display($c) ?>

<?php $view->inc('elements/footer.php') ?>
