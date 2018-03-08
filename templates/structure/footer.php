<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$commit = $this->e(substr(getenv('VERSION'), 0, 8));
?>

<div class="footer text-center">
    Copyright &copy; <?= $this->e(date('Y')); ?> Cascadia PHP &nbsp;
    Commit: <a href="https://github.com/phpdx/phpdx.org/commit/<?= $commit ?>/"><?= $commit ?></a>
</div>
