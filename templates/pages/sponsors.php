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
    <div class="platinum">
        <h4 class="px3 mt1 mb0 bold-text center">Platinum</h4>
        <div class="mx2 flex flex-wrap justify-center">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => 'https://www.concrete5.org/packages/concrete5_theme/themes/concrete5/images/logo.png',
                'alt' => 'concrete5 Open Source CMS',
                'link' => 'https://www.concrete5.org/#cascadiaPHP',
                'width' => 841,
                'height' => 157
            ]);
            ?>
        </div>
    </div>
    <div class="gold">
        <h4 class="px3 sm-center center">Gold</h4>
        <div class="mx2 flex flex-wrap justify-center">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => '/images/sponsors/twilio.svg',
                'alt' => 'Twilio',
                'link' => 'https://www.twilio.com/#cascadiaPHP',
            ]);
            ?>
        </div>
    </div>
    <div class="silver">
        <h4 class="px3 sm-center center">Silver</h4>
        <div class="mx2 flex flex-wrap justify-center">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => '/images/sponsors/osmi.png',
                'alt' => 'OSMI',
                'link' => 'https://osmihelp.org/#cascadiaPHP'
            ]);
            $this->insert('structure/sponsor', [
                'logo' => '/images/sponsors/mysql.svg',
                'alt' => 'MySQL',
                'link' => 'https://www.mysql.com/#cascadiaPHP'
            ]);
            ?>
        </div>
    </div>
    <div class="Bronze">
        <h4 class="px3 sm-center center">Bronze</h4>
        <div class="mx2 flex flex-wrap justify-center">
            <?php
            $this->insert('structure/sponsor', [
                'logo' => '/images/sponsors/api-city.jpg',
                'alt' => 'API-City',
                'link' => 'https://apicity.io/#cascadiaPHP',
                'margin' => false,
                'width' => 500,
                'height' => 390
            ]);
            ?>
        </div>
    </div>
</div>
