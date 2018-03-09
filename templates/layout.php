<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
?>
<html>
<head>
    <title><?= $this->e($title ?? 'Untitled') ?></title>
    <link rel="stylesheet" href="<?= $this->asset('/css/vendor.css') ?>" async />
    <link rel="stylesheet" href="<?= $this->asset('/css/small.css') ?>" />
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115467305-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-115467305-1');
    </script>
</head>
<body>

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
