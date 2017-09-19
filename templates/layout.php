<?php
/** @var \PHPDX\Site\Template\Template $this */
?>
<html>
<head>
    <title><?=$this->e($title ?? 'Untitled')?></title>
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/simplegrid.css" rel="stylesheet" />
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
    <?=$this->section('content')?>
</div>


<?php
if ($footer ?? true) {
    $this->insert('structure/footer');
}
?>

</body>
</html>
