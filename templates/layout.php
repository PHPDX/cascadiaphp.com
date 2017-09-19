<?php
/** @var \PHPDX\Site\Template\Template $this */
?>
<html>
<head>
    <title><?= $this->e($title ?? 'Untitled') ?></title>
    <style>
        <?php include __DIR__ . '/../public/css/main.css' ?>
        <?php include __DIR__ . '/../public/css/simplegrid.css' ?>
    </style>
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
