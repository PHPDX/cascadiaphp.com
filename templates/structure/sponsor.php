<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>

<div class="flex p2 sponsor">
    <amp-layout layout="responsive" width="1" height="1" sizes="(min-width: 40em) 200px, calc(100vw - 6em)" class="circle b-<?= $borderColor ?? 'black' ?> bg-<?= $backgroundColor ?? 'white' ?>">
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
