<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$this->layout('layout', [
    'title' => 'Cascadia PHP',
    'active' => '/'
]);
?>

<div class="container main">
    <section class="main-cta">
        <div class="item item-top"></div>
        <div class="item text-center main-item">
            <div class="hidden-sm">
                <?= $this->markdown('comingsoon') ?>
            </div>
        </div>
        <div class="item item-bottom"></div>
    </section>
</div>
