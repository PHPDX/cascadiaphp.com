<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php
// Set the template
$this->layout('layout');

// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/brand.css');

// Stop the css section
$this->stop();
?>

<h1 class="center bold p3 m0">500</h1>
<h2 class="center m0 p3">Uh oh, somethin aint right. Please reach out to leadership@cascadiaphp.com and report this issue!</h2>