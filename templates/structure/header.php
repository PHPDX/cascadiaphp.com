<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
?>
<div id="header" class="flex bg-light relative">
    <div class="flex-auto relative my1 ml3">
        <amp-img src="/images/logo.svg" height=263 width=705 layout="fill"></amp-img>
    </div>
    <div id="nav_container" class="flex justify-end xs-hide sm-hide mr1"></div>
    <div class="flex flex-column justify-center md-hide lg-hide">
        <a class="hamburger h3 mr3" on='tap:sidebar.open'>
            <i class="mbri-menu"></i>
        </a>
    </div>
</div>
