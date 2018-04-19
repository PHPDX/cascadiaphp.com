<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php

// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/brand.css');

// Stop the css section
$this->stop();
?>
<h1 class="px3 my0 mb3 cubes pb2 pt3 border-bottom b2 b-gold bg-white darkblue">
    Schedule
</h1>

<div>
<div class="md-col lg-col md-col-6 lg-col-6 px3">
    <h3 class="">September 14th</h3>
    <span>To be announced.</span>
</div>
<div class="md-col lg-col md-col-6 lg-col-6 px3">
    <h3 class="">September 15th</h3>

    <span>To be announced.</span>
</div>
