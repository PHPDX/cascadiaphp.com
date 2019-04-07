<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Core\View\View $view */
$view = $view ?? null;
?>
<!doctype html>

<html lang="<?= Concrete\Core\Localization\Localization::activeLanguage() ?>">
<head>
    <?php $view->element('header_required') ?>
</head>
<body>
