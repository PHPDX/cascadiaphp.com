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
<h1 class="my0 mb3 cubes pb2 pt3 border-bottom b2 b-gold bg-white px3 darkblue">Venue</h1>
<h3 class="p3 center">
    We've secured a venue, but we're not ready to announce details.
</h3>

<h4 class="p3 center">
    <span>
        Please <a href="/register">Join our Mailing List</a> for updates!
    </span>
</h4>
