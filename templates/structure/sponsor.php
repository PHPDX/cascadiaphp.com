<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>

<?php if (isset($link)): ?>
    <a class="flex-item p2 sponsor" href="<?= $link ?>">
<?php else: ?>
    <div class="flex-item p2 sponsor">
<?php endif ?>
        <amp-img
                src="<?= $logo ?>"
                layout="responsive"
                class="object-contain"
                height="<?= $height ?? 1 ?>"
                width="<?= $width ?? 1 ?>"
                heights="200px"
                sizes="(min-width: 200px) 200px, calc(100vw - 4em)"
                alt="<?= $alt ?? '' ?>">
            <?php if ($fallback ?? false): ?>
                <div fallback>
                    <?= $fallback ?>
                </div>
            <?php endif; ?>
        </amp-img>
    <?php if ($local ?? false): ?>
        <span class="mbri-star local-icon gold h3"></span>
    <?php endif; ?>

<?php if (isset($link)): ?>
    </a>
<?php else: ?>
    </div>
<?php endif ?>
