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

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>
        <?= $this->inline('/css/app.css'); ?>
        <?= $this->section('css') ?>
    </style>
    <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway" rel="stylesheet" async>

    <?= $this->section('components') ?>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
</head>
<body class="cascadiaphp">

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
if ($header ?? true) {
    $this->insert('structure/header', [
        'nologo' => $nologo ?? false,
        'active' => $active ?? ''
    ]);
}
?>

<div class="main-content container">
    <?= $this->section('content') ?>
</div>

<?php
if ($footer ?? true) {
    $this->insert('structure/footer');
}
?>

</body>
</html>
