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

<div class="my0 mb3 cubes pb2 pt3 border-bottom b2 b-gold bg-white">
    <div class="flex justify-center">
        <div class="col-12 md-col-8 sm-col-10 lg-col-6 px3">
            <h1 class="content-left darkblue p0 m0">Speakers</h1>
        </div>
    </div>
</div>

<div class="flex justify-center">
    <div class="col-12 md-col-8 sm-col-10 lg-col-6 px3">
        <p>
            If you're interested in speaking at Cascadia PHP 2018, check out our
            <a href="https://cfp.cascadiaphp.com/">CFP talk submission site</a> and submit!
        </p>
        <p>
            For our first year we are planning for 3 tracks with 50 minute sessions in each, and we're interested in a wide range of topics.<br>
            Here are some ideas for topics we'd love to hear about:
        </p>
        <ul>
            <li>PHP internals</li>
            <li>Version control</li>
            <li>Framework-related topics</li>
            <li>Building APIs (REST, SOAP, whatever)</li>
            <li>Mobile-first design</li>
            <li>Professional development</li>
            <li>Testing (unit, functional, etc.)</li>
            <li>Alternate PHP run-times</li>
            <li>Development principles</li>
            <li>Continuous Integration</li>
            <li>Getting involved in the PHP community</li>
            <li>User Experience/Usability</li>
            <li>Technology at large</li>
            <li>Security</li>
            <li>Connecting to Different APIs</li>
            <li>Development Tools</li>
            <li>Virtualization and environments</li>
            <li>Javascript</li>
            <li>Modern hosting practices</li>
            <li>Language Features</li>
            <li>Databases</li>
            <li>Refactoring legacy applications</li>
            <li>Running/contributing to open source projects</li>
            <li>AI and AR</li>
            <li>User Groups</li>
        </ul>
    </div>
</div>
