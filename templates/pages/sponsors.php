<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php
// Set the template
$this->layout('layout', [
    'active' => '/sponsors',
    'title' => 'Sponsors that made Cascadia PHP happen - Portland Oregon Conference - Cascadia PHP'
]);

// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/sponsors.css');

// Stop the css section
$this->stop();
?>
<div class="sponsors">
    <h1 class="px3 mt0 mb3">Sponsors</h1>
    <p class="px3 center">
        Our sponsors help make this event possible! They are committed to building the Portland PHP community and would
        love to hear from you!
    </p>
    <div class="diamond">
        <h3 class="px3">💎 Diamond</h3>
        <div class="mx2 flex flex-wrap">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/yoga-baby.svg',
                'width' => 283.46,
                'height' => 78.29,
                'borderColor' => 'lightblue'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/fast-banana.svg',
                'width' => 283.46,
                'height' => 78.29,
                'borderColor' => 'lightblue'
            ]);
            ?>
        </div>
    </div>
    <div class="gold">
        <h3 class="px3">🥇 Gold</h3>
        <div class="mx2 flex flex-wrap">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/baby-swim.svg',
                'borderColor' => 'gold'
            ]);
            ?>
        </div>
    </div>
    <div class="silver">
        <h3 class="px3">🥈 Silver</h3>
        <div class="mx2 flex flex-wrap">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/the-web-works.svg',
                'borderColor' => 'gravel'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/petes-blinds.svg',
                'borderColor' => 'gravel'
            ]);
            ?>
        </div>
    </div>
    <div class="Bronze">
        <h3 class="px3">🥉 Bronze</h3>
        <div class="mx2 flex flex-wrap">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/crofts-accountants.svg',
                'borderColor' => 'bronze'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/cheshire-county-hygiene-services.svg',
                'borderColor' => 'bronze'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/auto-speed.svg',
                'borderColor' => 'bronze'
            ]);
            ?>
        </div>
    </div>
    <div class="Bronze">
        <h3 class="px3">💝 Special Mention</h3>
        <div class="mx2 flex flex-wrap">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => 'http://www.concrete5.org/packages/concrete5_theme/themes/concrete5/images/logo.png',
                'borderColor' => 'slate'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'https://cdn-images-1.medium.com/max/800/1*AnYF2aMcrnt7JqmPrXB65w.png',
                'borderColor' => 'slate'
            ]);
            ?>
        </div>
    </div>
</div>