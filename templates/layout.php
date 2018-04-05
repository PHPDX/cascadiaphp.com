<?php
/**
 * @var \Psr\Container\ContainerInterface $container
 * @var \CascadiaPHP\Site\Template\Template $this
 * @var string|null $title
 * @var string|null $url
 */

use CascadiaPHP\Site\SEO\SEOTools;

?>
<!doctype html>
<html amp class="bg-white">
<head>
    <?php /** Enable AMP */ ?>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>

    <?= $this->section('metatags', $container->get(SEOTools::class)->generate()) ?>

    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <title><?= $this->e($title ?? 'Cascadia PHP 2018') ?></title>

    <link rel="canonical" href="<?= $this->fullUri($url ?? '') ?>" />

    <?= $this->section('schema', $container->get('schema')) ?>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom><?= $this->section('css') ?></style>

    <?= $this->section('components') ?>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-position-observer" src="https://cdn.ampproject.org/v0/amp-position-observer-0.1.js"></script>
    <script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>
    <script async custom-element="amp-install-serviceworker" src="https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,700">
</head>
<body class="cascadiaphp">

<amp-install-serviceworker src="/serviceworker.js"
                           data-iframe-src="<?= $this->formUri('/serviceworker') ?>"
                           layout="nodisplay">
</amp-install-serviceworker>

<?= $this->section('header') ?>

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

<?php
$this->insert('structure/sidebar', [
    'active' => $active ?? ''
]);

?>

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
