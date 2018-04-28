<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>

<?php if (isset($link)): ?>
    <a href="<?= $link ?>">
<?php endif ?>

<div class="flex p2 sponsor">
    <amp-layout layout="responsive" width="1" height="1" sizes="(min-width: 40em) calc((1440px - 14em) / 3), calc(100vw - 6em)" class="shadow-md circle b-<?= $borderColor ?? 'black' ?> bg-<?= $backgroundColor ?? 'white' ?>">
        <amp-img class="object-cover object-contain m3"
                 src="<?= $logo ?>"
                 layout="fill"
                 alt="<?= $alt ?>">
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

<?php if (isset($link)): ?>
    </a>
<?php endif ?>
