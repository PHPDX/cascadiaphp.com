<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php
// Set the template
$this->layout('layout', [
    'active' => '/speakers',
    'title' => 'The Speaker Lineup - Portland Oregon Conference - Cascadia PHP'
]);

// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/brand.css');

// Stop the css section
$this->stop();
?>
<h3 class="p3 center">
    We aren't ready to put out our list of speakers. If you're interested in speaking, follow our social media accounts and
    our <a href="/register">Join our Mailing List</a> and you'll be the first to know about our CFP.
</h3>

<h4 class="p3 center">
    <span>
        Please <a href="/register">Join our Mailing List</a> for updates!
    </span>
</h4>

