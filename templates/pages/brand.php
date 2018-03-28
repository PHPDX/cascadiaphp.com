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


<?php
function textile($class) {
    $colors = ['gold', 'darkblue', 'blue', 'lightblue', 'slate', 'gravel'];
    echo '<h3>' . ucfirst(str_replace('-', ' ', $class)) . '</h3><div class="flex textiles flex-wrap">';
    foreach ($colors as $color) {
        echo '<div class="flex-auto"><amp-layout layout="responsive" width="1" height="1" class="bg-' . $color . ' ' . $class . '"></amp-layout></div>';
    }
    echo "</div>";
}

function buttons(array $buttons) {
    foreach ($buttons as $type) {
        echo "<span class='btn m1 btn-{$type}'>" . ucfirst($type) . "</span>";
        echo "<span class='btn m1 inverted btn-{$type}'>" . ucfirst($type) . "</span>";
    }
}
?>

<h1 class="px3">Basic Elements</h1>
<h1 class="flex-auto px3">Header 1</h1>
<h2 class="flex-auto px3">Header 2</h2>
<h3 class="flex-auto px3">Header 3</h3>
<h4 class="flex-auto px3">Header 4</h4>
<h5 class="flex-auto px3">Header 5</h5>
<h6 class="flex-auto px3">Header 6</h6>

<div class="p3">
    <p>This is an <a href="#">example</a> of a long string that has a link in it.</p>
    <p><?= $this->lipsum(1) ?></p>
    <p><?= $this->lipsum(1) ?></p>
</div>

<div class="p3 bg-gold dark">
    <p>This is an <a href="#">example</a> of a long string that has a link in it.</p>
    <p><?= $this->lipsum(1) ?></p>
    <p><?= $this->lipsum(1) ?></p>
</div>

<div class="p3 bg-darkblue light">
    <p>This is an <a href="#">example</a> of a long string that has a link in it.</p>
    <p><?= $this->lipsum(1) ?></p>
    <p><?= $this->lipsum(1) ?></p>
</div>

<div class="p3 bg-blue dark">
    <p>This is an <a href="#">example</a> of a long string that has a link in it.</p>
    <p><?= $this->lipsum(1) ?></p>
    <p><?= $this->lipsum(1) ?></p>
</div>

<div class="p3 bg-lightblue dark">
    <p>This is an <a href="#">example</a> of a long string that has a link in it.</p>
    <p><?= $this->lipsum(1) ?></p>
    <p><?= $this->lipsum(1) ?></p>
</div>

<div class="p3 bg-slate light">
    <p>This is an <a href="#">example</a> of a long string that has a link in it.</p>
    <p><?= $this->lipsum(1) ?></p>
    <p><?= $this->lipsum(1) ?></p>
</div>

<div class="p3 bg-gravel dark">
    <p>This is an <a href="#">example</a> of a long string that has a link in it.</p>
    <p><?= $this->lipsum(1) ?></p>
    <p><?= $this->lipsum(1) ?></p>
</div>

<h1 class="px3">Buttons</h1>
<div class="px3 flex flex-column">
    <div>
        <p>All buttons have been adjusted to be fully ADA compliant</p>
        <span class='btn m1 btn-darkblue'>Dark Blue</span>
        <span class='btn m1 btn-darkblue inverted'>Dark Blue</span>
        <span class='btn m1 btn-lightblue'>Light Blue</span>
        <span class='btn m1 btn-slate inverted'>Slate</span>
        <span class='btn m1 btn-gravel'>Gravel</span>
    </div>
    <div>
        <h4>Generic Colors</h4>
        <?php buttons(['gold', 'darkblue', 'blue', 'lightblue', 'slate', 'gravel']) ?>
    </div>
    <div>
        <h4>Named Buttons</h4>
        <?php buttons(['dark', 'light', 'primary', 'success', 'alert', 'info']) ?>
    </div>
</div>

<h1 class="px3">Textiles</h1>
<div class="px3">
    <h3>Fabrics</h3>
    <?= textile('cloth') ?>
    <?= textile('fabric-light') ?>
    <?= textile('fabric-dark') ?>
    <?= textile('felt-dark') ?>
    <?= textile('felt-light') ?>
    <?= textile('denim-dark') ?>
    <?= textile('canvas') ?>
    <?= textile('woven-dark') ?>
    <?= textile('woven-light') ?>
    <h3>Wood</h3>
    <?= textile('bark') ?>
    <?= textile('wood') ?>
    <h3>Geometric</h3>
    <?= textile('cubes') ?>
    <?= textile('triangles') ?>
    <?= textile('hexabump') ?>
    <h3>Materials</h3>
    <?= textile('concrete') ?>
    <?= textile('eggshell') ?>
    <?= textile('noisy') ?>
    <?= textile('shattered') ?>
</div>

