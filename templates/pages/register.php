<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php
// Set the template
$this->layout('layout', [
    'active' => '/register'
]);

// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/register.css');

// Stop the css section
$this->stop();

$this->start('components'); ?>
<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
<?php $this->stop() ?>

<?php $this->start('header') ?>
<amp-analytics type="googleanalytics">
</amp-analytics>
<?php $this->stop() ?>

<div>
    <h1 class="m0 px3">Cascadia PHP</h1>
    <p class="px3">
        September 14th - 15th 2018<br>
        Portland Oregon
    </p>
    <amp-iframe
            sandbox="allow-scripts"
            height="400"
            layout="fixed-height"
            src="https://www.picatic.com/events/widget/203031?width=std"
            frameborder="0">
        <amp-fit-text layout="responsive" width="5" height="1" class="lightblue center" max-font-size="50px" placeholder></amp-fit-text>
    </amp-iframe>
</div>
