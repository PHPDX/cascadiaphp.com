<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>

<div class="flex p2">
    <amp-layout layout="responsive" width="1" height="1" sizes="200px" class="circle b-<?= $borderColor ?? 'black' ?> bg-<?= $backgroundColor ?? 'white' ?>">
        <amp-img class="object-cover object-contain m3"
                 src="<?= $logo ?>"
                 layout="fill">
            <?php if ($fallback ?? false): ?>
                <div fallback>
                    <?= $fallback ?>
                </div>
            <?php endif; ?>
        </amp-img>
    </amp-layout>
    <?php if ($local ?? false): ?>
        <span class="mbri-star local-icon gold h3"></span>
    <?php endif; ?>
</div>
