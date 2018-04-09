<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$commit = $this->e(substr(getenv('VERSION'), 0, 8));
?>

<section id="footer" class="text-center flex flex-column justify-center content-center dark bg-gravel white relative">
    <div class="flex flex-column items-center">
        <div class="center white col-8">
            <span class="nowrap">Copyright &copy; <?= $this->e(date('Y')); ?></span> <span class="nowrap">Cascadia PHP</span>
        </div>
        <div class="center white col-8">Commit: <a href="https://github.com/phpdx/cascadiaphp.com/commit/<?= $commit ?>/"><?= $commit ?></a></div>
    </div>
    <div class="social flex flex-column left absolute">
        <amp-social-share type="twitter"></amp-social-share>
        <amp-social-share type="facebook" data-param-app_id="200338927232973"></amp-social-share>
    </div>
</section>
