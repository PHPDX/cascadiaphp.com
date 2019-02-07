<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php

// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/register.css');

// Stop the css section
$this->stop();

$this->start('components'); ?>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
<?php $this->stop() ?>

<?php $this->start('header') ?>

<?php $this->stop() ?>

<h1 class="my0 cubes pb2 pt3 border-bottom b2 b-gold bg-white px3 darkblue">Registration</h1>


<h3 class="center">Check back soon for registration!</h3>
<p class="center ">
    <a href="https://twitter.com/cascadiaphp" target="_blank" aria-label="Link to Cascadia PHP Twitter">Follow us on Twitter</a>
    to be the first to know!
</p>