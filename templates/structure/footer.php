<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$commit = $this->e(substr(getenv('VERSION'), 0, 8));
?>

<section id="footer" class="text-center flex flex-column justify-center content-center dark bg-lightblue mt3">
    <div class="center">Copyright &copy; <?= $this->e(date('Y')); ?> Cascadia PHP &nbsp;</div>
    <div class="center">Commit: <a href="https://github.com/phpdx/cascadiaphp.com/commit/<?= $commit ?>/"><?= $commit ?></a></div>
</section>
