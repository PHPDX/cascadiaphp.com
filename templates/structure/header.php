<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
?>

<div id="top-marker" class="absolute"></div>
<div id="header" class="flex bg-darkblue relative mt2">
    <div class="flex-auto relative m3">
        <a href="/"><amp-img src="/images/logo-cascadia-thin-lt.svg" height=263 width=705 layout="fill" noloading></amp-img></a>
    </div>
    <div id="nav_container" class="flex justify-end xs-hide sm-hide mr3"></div>
    <div class="flex flex-column justify-center md-hide lg-hide">
        <a class="hamburger h3 mr3" on='tap:sidebar.open'>
            <i class="mbri-menu"></i>
        </a>
    </div>
</div>


<div id="marker" class="absolute z0">
    <amp-position-observer on="enter:hideBackToTop.start; exit:showBackToTop.start" layout="nodisplay">
    </amp-position-observer>
</div>

<button class="back-to-top btn btn-gold fixed z4" on="tap:top-marker.scrollTo(duration=200)">
    <amp-fit-text layout="responsive" width="1" height="1"><i class="mbri-arrow-up bold-text"></i></amp-fit-text>
</button>

<amp-animation id="hideBackToTop" layout="nodisplay">
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
