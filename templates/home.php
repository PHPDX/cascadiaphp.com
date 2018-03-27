<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$this->layout('layout', [
    'title' => 'Cascadia PHP',
    'url' => '/'
]);
?>

<?php $this->start('components') ?>
<script async custom-element="amp-animation" src="https://cdn.ampproject.org/v0/amp-animation-0.1.js"></script>
<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
<?php $this->end() ?>

<?php $this->start('css') ?>
<?= $this->inline('/css/pages/home.css') ?>
<?php $this->end() ?>

<amp-animation id="waves" layout="nodisplay">
    <script type="application/json">
        {
            "selector": ".waves",
            "animations": [
                {
                    "iterations": "infinite",
                    "keyframes": {
                        "from": {
                            "background-position": "0px 0px"
                        },
                        "to": {
                            "background-position": "10px 0px"
                        }
                    }
                }
            ]
        }
    </script>
</amp-animation>

<section class="what">
    <div class="main-animation relative">
        <div class="bridge">
            <div class="flex flex-row">
                <div class="left-upright relative">
                    <amp-img src="/images/scenes/what/bridge/svg/right-upright.svg" width="259px" height="85px"
                             layout="fill"></amp-img>
                </div>
                <div class="bridge-deck relative">
                    <div class="main-cta">
                        <div class="flex flex-column p2">
                            <div class="date relative flex-auto">
                                <amp-fit-text width="100"
                                              height="20"
                                              layout="responsive"
                                              min-font-size="24px"
                                              class="xs-hide">
                                    <span class="month">September</span><br><span class="days">15th-16th</span>
                                </amp-fit-text>

                                <amp-fit-text width="200"
                                              height="100"
                                              layout="responsive"
                                              min-font-size="24px"
                                              class="sm-hide md-hide lg-hide xl-hide">
                                    <span class="month">September</span><br><span class="days">15th-16th</span>
                                </amp-fit-text>
                            </div>
                            <div class="register center p2">
                                <a href="/register" class="btn btn-primary inverted big fancy">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-upright relative">
                    <amp-img src="/images/scenes/what/bridge/svg/right-upright.svg" width="259px" height="85px" layout="fill"></amp-img>
                </div>
            </div>
        </div>
        <div class="waves-2"></div>
        <div class="waves"></div>
        <div class="knoll left-knoll left absolute"></div>
        <div class="knoll right-knoll right absolute"></div>
    </div>
    <div class="second-cta bg-purple relative center flex justify-evenly flex-row bg-dark">
        <div class="relative my2 mx3">
            <amp-fit-text layout="fill">
                <div class="flex justify-center align-start">
                    <i class="mbri-clock green inline-block"></i>
                    <span class="light font1 inline-block ml2">
                        2.5 Days
                    </span>
                </div>
            </amp-fit-text>
        </div>
        <div class="relative my2 mx3">
            <amp-fit-text layout="fill">
                <div class="flex flex-row justify-center align-start">
                    <i class="mbri-users green inline-block"></i>
                    <span class="light font1 inline-block ml2">
                        200+ Devs
                    </span>
                </div>
            </amp-fit-text>
        </div>
        <div class="relative my2 mx3">
            <amp-fit-text layout="fill">
                <div class="flex flex-row justify-center align-start">
                    <i class="mbri-idea green inline-block"></i>
                    <span class="light font1 inline-block ml2">
                        3 Tracks
                    </span>
                </div>
            </amp-fit-text>
        </div>
    </div>
    <div class="third-cta bg-light relative">
    </div>
</section>

<section class="where relative bg-light">
    derp
</section>
