<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$commit = $this->e(substr(getenv('VERSION'), 0, 8));
?>

<section class="footer text-center">
    Copyright &copy; <?= $this->e(date('Y')); ?> Cascadia PHP &nbsp;
    Commit: <a href="https://github.com/phpdx/cascadiaphp.com/commit/<?= $commit ?>/"><?= $commit ?></a>
</section>
