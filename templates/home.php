<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$this->layout('layout', [
    'title' => 'Cascadia PHP',
    'url' => '/'
]);
?>

<section class="main-cta">
    <div class="text-center main-item align-middle">
        <div class="hidden-sm">
            <?= $this->markdown('comingsoon') ?>
        </div>
    </div>
</section>
