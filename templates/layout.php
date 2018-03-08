<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
?>
<html>
<head>
    <title><?= $this->e($title ?? 'Untitled') ?></title>
    <link rel="stylesheet" href="<?= $this->asset('/css/app.css') ?>" />
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
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
