<?php
/** @var \PHPDX\Site\Template\Template $this */
$commit = $this->e(substr(getenv('VERSION'), 0, 8));
?>

<div class="footer-floater center">
    Copyright &copy; <?= $this->e(date('Y')); ?> PHPDX &nbsp;
    Commit: <a href="https://github.com/buttress/phpdx.org/commit/<?= $commit ?>/"><?= $commit ?></a>
</div>
