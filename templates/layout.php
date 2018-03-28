<?php
/**
 * @var \CascadiaPHP\Site\Template\Template $this
 * @var string|null $title
 * @var string|null $url
 */
?>
<!doctype html>
<html amp>
<head>
    <?php /** Enable AMP */ ?>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>

    <?= $this->section('metatags') ?>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <title><?= $this->e($title ?? 'Untitled') ?></title>

    <link rel="canonical" href="<?= $this->fullUri($url ?? '') ?>" />
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>

    <?= $this->section('schema', '<!-- No Schema -->') ?>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom><?= $this->section('css') ?></style>

    <?= $this->section('components') ?>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-install-serviceworker" src="https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js"></script>
    <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
</head>
<body class="cascadiaphp">

<?= $this->section('header') ?>

<amp-sidebar id="sidebar" layout="nodisplay" side="right">
    <div class="center p2">
        <amp-fit-text width="100" height="20px" layout="responsive" class="flex-auto">Cascadia PHP</amp-fit-text>
    </div>
    <div class="sidebar-ul flex flex-column center m2">
        <div class="m1">
            <a href="#" class="btn btn-dark inverted">News</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-dark inverted">Schedule</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-dark inverted">Speakers</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-dark inverted">Venue</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-dark inverted">Sponsors</a>
        </div>
    </div>

    <nav toolbar="(min-width: 52em)" toolbar-target="nav_container" class="header-nav flex">
        <ul class="inner flex justify-end">
            <li class="flex-auto flex flex-column justify-center">
                <a href="#" class="py1 px2">News</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Schedule</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Speakers</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Venue</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Sponsors</a>
            </li>
        </ul>
    </nav>
</amp-sidebar>

<amp-analytics type="googleanalytics">
    <script type="application/json">
        {
            "vars": {
                "account": "UA-115467305-1"
            },
            "triggers": {
                "trackPageview": {
                    "on": "visible",
                    "request": "pageview"
                }
            }
        }
    </script>
</amp-analytics>

<div class="main-structure mx-auto relative flex flex-column justify-between">
    <?php
    if ($header ?? true) {
        $this->insert('structure/header', [
            'nologo' => $nologo ?? false,
            'active' => $active ?? ''
        ]);
    }
    ?>

    <section class="main-content container">
        <?= $this->section('content') ?>
    </section>

    <?php
    if ($footer ?? true) {
        $this->insert('structure/footer');
    }
?>
</div>

<?= $this->section('footer') ?>
</body>
</html>
