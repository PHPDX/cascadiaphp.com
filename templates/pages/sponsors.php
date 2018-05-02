<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php
// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/sponsors.css');

// Stop the css section
$this->stop();
?>

<h1 class="my0 mb3 cubes pb2 pt3 border-bottom b2 b-gold bg-white px3 darkblue">Sponsors</h1>
<div class="sponsors mb3">
    <p class="center">
        Our sponsors help make this event possible! They are committed to building the Portland PHP community and would
        love to hear from you!
    </p>
    <div class="diamond">
        <h3 class="px3">💎 Diamond</h3>
        <div class="mx2 flex flex-wrap">
            <?php
            /**
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/yoga-baby.svg',
                'width' => 283.46,
                'height' => 78.29,
                'borderColor' => 'lightblue'
            ]);
            */
            ?>
            <h4 class="px2 center col-12 mb1">We don't have any <span class="text-bold lightblue">Diamond</span> level Sponsors yet!</h4>
            <div class="center px3 col-12">
                Is your company interested in bringing PHP to the Pacific Northwest?<br>
                Contact us via <a href="mailto:sponsorship@cascadiaphp.com">sponsorship@cascadiaphp.com</a>
            </div>
        </div>
    </div>
    <div class="gold">
        <h3 class="px3">🥇 Gold</h3>
        <div class="mx2 flex flex-wrap rounded">
            <?php
            /**
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/baby-swim.svg',
                'borderColor' => 'gold'
            ]);
             */
            ?>
            <h4 class="px2 center col-12">We don't have any <span class="gold">Gold</span> level Sponsors yet!</h4>
        </div>
    </div>
    <div class="silver">
        <h3 class="px3 sm-center">🥈 Silver</h3>
        <div class="mx2 flex flex-wrap rounded">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => '/images/sponsors/osmi.png',
                'borderColor' => 'gravel',
                'alt' => 'OSMI',
                'link' => 'https://osmihelp.org/'
            ]);
            /*
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/the-web-works.svg',
                'borderColor' => 'gravel'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'http://pigment.github.io/fake-logos/logos/vector/color/petes-blinds.svg',
                'borderColor' => 'gravel'
            ]);
            */
            ?>
        </div>
    </div>
    <div class="Bronze">
        <h3 class="px3 sm-center">🥉 Bronze</h3>
        <div class="mx2 flex flex-wrap rounded">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => '/images/sponsors/api-city.jpg',
                'borderColor' => 'bronze',
                'alt' => 'API-City',
                'link' => 'https://apicity.io/',
                'margin' => false
            ]);
            /*
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
            */
            ?>
        </div>
    </div>
    <div class="Bronze">
        <h3 class="px3 sm-center">💝 Special Mention</h3>
        <div class="mx2 flex flex-wrap rounded">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => 'https://www.concrete5.org/packages/concrete5_theme/themes/concrete5/images/logo.png',
                'borderColor' => 'slate',
                'alt' => 'concrete5 Open Source CMS',
                'link' => 'https://www.concrete5.org/'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'https://cdn-images-1.medium.com/max/800/1*AnYF2aMcrnt7JqmPrXB65w.png',
                'borderColor' => 'slate',
                'alt' => 'Treehouse',
                'link' => 'https://teamtreehouse.com/'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => 'https://phpdx.org/images/logo.svg',
                'borderColor' => 'slate',
                'alt' => 'PHPDX User Group',
                'link' => 'https://phpdx.org/'
            ]);
            ?>
        </div>
    </div>
</div>
