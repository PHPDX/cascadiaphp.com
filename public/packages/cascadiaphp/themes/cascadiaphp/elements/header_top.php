<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var Concrete\Core\View\View $view */
$view = $view ?? null;
/** @var Concrete\Core\Page\Page $c */
$c = $c ?? null;
?>
<!doctype html>

<html lang="<?= Concrete\Core\Localization\Localization::activeLanguage() ?>">
<head>
    <?php $view->element('header_required') ?>

    <?php
    $opengraph = new Artesaos\SEOTools\OpenGraph();
    $twitter = new Artesaos\SEOTools\TwitterCards();

    $opengraph->setType('website');
    $twitter->setType('summary_large_image');

    $site = $c->getSite();
    $opengraph->setSiteName($site->getSiteName());
    $twitter->setSite('@cascadiaphp');

    $title = $c->getAttribute('meta_title') ?? $c->getCollectionName();
    $opengraph->setTitle($title);
    $twitter->setTitle($title);

    $description = $c->getAttribute('meta_description') ?? $c->getAttribute('description');
    if ($description) {
        $opengraph->setDescription($description);
        $twitter->setDescription($description);
    }

    // If there's a thumbnail image set for this page
    $thumbnail = $c->getAttribute('page_thumbnail');
    if ($thumbnail) {
        if ($thumbnail instanceof Concrete\Core\Entity\File\File) {
            $url = $thumbnail->getVersion()->getURL();
            $twitter->setImage($url);
            $opengraph->addImage($url);
        }
    }

    echo $opengraph->generate();
    echo $twitter->generate();
    ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
