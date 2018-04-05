<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
?>
<amp-sidebar id="sidebar" class="bg-darkblue" layout="nodisplay" side="right" sizes="(min-width: 400px) 350px, 80vw">
    <div class="center px3 py2 bg-white">
        <amp-img class="logo" src="/images/logo.svg" height=263 width=705 layout="responsive"></amp-img>
    </div>
    <div class="sidebar-ul flex flex-column center m2">
        <?php /*
        <div class="m1">
            <a href="/news" class="btn btn-darkblue inverted block <?= $active === '/news' ? 'active' : '' ?>">
                News
            </a>
        </div>
        */ ?>
        <div class="m1">
            <a href="/schedule" class="btn btn-darkblue inverted block <?= $active === '/schedule' ? 'active' : '' ?>">
                Schedule
            </a>
        </div>
        <div class="m1">
            <a href="/speakers" class="btn btn-darkblue inverted block <?= $active === '/speakers' ? 'active' : '' ?>">
                Speakers
            </a>
        </div>
        <div class="m1">
            <a href="/venue" class="btn btn-darkblue inverted block <?= $active === '/venue' ? 'active' : '' ?>">
                Venue
            </a>
        </div>
        <div class="m1">
            <a href="/sponsors" class="btn btn-darkblue inverted block <?= $active === '/sponsors' ? 'active' : '' ?>">
                Sponsors
            </a>
        </div>
        <div class="m1 mt3">
            <a href="/register" class="btn btn-cta block">Register</a>
        </div>
    </div>

    <nav toolbar="(min-width: 52em)" toolbar-target="nav_container" class="header-nav flex">
        <ul class="inner flex justify-end light">
            <?php /*
            <li class="flex-auto md-hide flex flex-column justify-center">
                <a href="/news" class="py1 px2 <?= $active === '/news' ? 'active' : '' ?>">
                    News
                </a>
            </li>
            */ ?>
            <li class="flex flex-column justify-center">
                <a href="/schedule" class="py1 px2 <?= $active === '/schedule' ? 'active' : '' ?>">
                    Schedule
                </a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="/speakers" class="py1 px2 <?= $active === '/speakers' ? 'active' : '' ?>">
                    Speakers
                </a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="/venue" class="py1 px2 <?= $active === '/venue' ? 'active' : '' ?>">
                    Venue
                </a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="/sponsors" class="py1 px2 <?= $active === '/sponsors' ? 'active' : '' ?>">
                    Sponsors
                </a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="/register" class="py1 px2 btn btn-cta">Register</a>
            </li>
        </ul>
    </nav>
</amp-sidebar>
