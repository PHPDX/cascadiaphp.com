<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php

$this->start('components');
?>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>
<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<?php
$this->stop();
?>

<amp-state id="state">
    <script type="application/json">
        <?= $json = $this->inline('/data/speakers.json') ?>
    </script>
</amp-state>

<h1 class="my0 cubes pb2 pt3 border-bottom b2 b-gold bg-white px3 darkblue">Speakers</h1>

<h3 class="center">CascadiaPHP's 2019 CFP will begin soon!</h3>
<p class="center ">
    <a href="https://twitter.com/cascadiaphp" target="_blank" aria-label="Link to Cascadia PHP Twitter">Follow us on Twitter</a>
    to be the first to know!
</p>