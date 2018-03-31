<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
?>
<div id="top-marker" class="absolute"></div>
<div id="header" class="flex bg-light relative">
    <div class="flex-auto relative m3">
        <a href="/"><amp-img src="/images/logo.svg" height=263 width=705 layout="fill" noloading></amp-img></a>
    </div>
    <div id="nav_container" class="flex justify-end xs-hide sm-hide mr1"></div>
    <div class="flex flex-column justify-center md-hide lg-hide">
        <a class="hamburger h3 mr3" on='tap:sidebar.open'>
            <i class="mbri-menu"></i>
        </a>
    </div>
</div>

<amp-sidebar id="sidebar" class="bg-darkblue" layout="nodisplay" side="right" sizes="(min-width: 400px) 350px, 80vw">
    <div class="center px3 py2 bg-white">
        <amp-img class="logo" src="/images/logo.svg" height=263 width=705 layout="responsive"></amp-img>
    </div>
    <div class="sidebar-ul flex flex-column center m2">
        <div class="m1">
            <a href="#" class="btn btn-darkblue inverted block">News</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-darkblue inverted block">Schedule</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-darkblue inverted block">Speakers</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-darkblue inverted block">Venue</a>
        </div>
        <div class="m1">
            <a href="#" class="btn btn-darkblue inverted block">Sponsors</a>
        </div>
    </div>

    <nav toolbar="(min-width: 52em)" toolbar-target="nav_container" class="header-nav flex">
        <ul class="inner flex justify-end">
            <li class="flex-auto md-hide flex flex-column justify-center">
                <a href="#" class="py1 px2">News</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Schedule</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Speakers</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Venue</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="py1 px2">Sponsors</a>
            </li>
            <li class="flex flex-column justify-center">
                <a href="#" class="btn btn-cta">Register</a>
            </li>
        </ul>
    </nav>
</amp-sidebar>

<div id="marker" class="absolute z0">
    <amp-position-observer on="enter:hideBackToTop.start; exit:showBackToTop.start"
                           layout="nodisplay">
    </amp-position-observer>
</div>

<button class="back-to-top btn btn-gold fixed z4"
        on="tap:top-marker.scrollTo(duration=200)">
    <amp-fit-text layout="responsive" width="1" height="1"><i class="mbri-arrow-up" alt="Back to top"></i></amp-fit-text>
</button>

<amp-animation id="hideBackToTop"
               layout="nodisplay">
    <script type="application/json">
        {
            "duration": "200ms",
            "fill": "both",
            "iterations": "1",
            "direction": "alternate",
            "animations": [{
                "selector": ".back-to-top",
                "keyframes": [{
                    "opacity": "0",
                    "visibility": "hidden"
                }]
            }]
        }
    </script>
</amp-animation>
<amp-animation id="showBackToTop"
               layout="nodisplay">
    <script type="application/json">
        {
            "duration": "200ms",
            "fill": "both",
            "iterations": "1",
            "direction": "alternate",
            "animations": [{
                "selector": ".back-to-top",
                "keyframes": [{
                    "opacity": "1",
                    "visibility": "visible"
                }]
            }]
        }
    </script>
</amp-animation>
