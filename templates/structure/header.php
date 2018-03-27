<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
?>

<div id="header" class="bg-dark">
    <nav class="flex mx-auto flex-row">
        <div class="logo row">
            <div class="image col col-2 p1 align-right">
                <amp-img src="/images/logo/svg/logo-badge.svg" height=1 width=1 layout="responsive"></amp-img>
            </div>
            <div class="text relative col col-10 light xs-hide font2">
                <amp-fit-text width="100px" height="10px" layout="responsive">Cascadia PHP</amp-fit-text>
            </div>
        </div>
        <div id="nav_container" class="right flex-auto">
        </div>
        <a class="relative hamburger-icon md-hide lg-hide flex-auto light right-align m3" on="tap:sidebar.toggle">
            <amp-fit-text layout="fill">
                <i class="mbri-menu"></i>
            </amp-fit-text>
        </a>
    </nav>
</div>
