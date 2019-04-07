<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Core\View\View $view */
$view = $view ?? null;
/** @var \Concrete\Core\Page\Page $c */
$c = $c ?? null;
?>

<div class="cp-fotter-bottom cp-row flex flex-column">
    <div class="cp-fotter-bottom-container flex cp-column cp-padded">
        <div class="flex-1 flex flex-column">
            <div class="cp-short-container">
                <div class="copyright">&copy; <?= date('Y') ?> Cascadia PHP Inc. All rights reserved.</div>
                <div class="credit">Designed &amp; Built by Cascadia PHP.</div>
            </div>
        </div>
        <div class="flex-1 flex flex-column cp-footer-logo">
            <?= globalArea('Footer Logo', $c) ?>
        </div>
        <div class="flex-1 flex flex-column cp-footer-pagelist">
            <div class="cp-short-container">
                <?= globalArea('Footer PageList', $c) ?>
            </div>
        </div>
    </div>
    <div class="cp-footer-social cp-column cp-padded">
        <?= globalArea('Footer Social', $c)?>
    </div>
</div>

</div>
</div>

<?php $view->inc('elements/footer_bottom.php') ?>
