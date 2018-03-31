<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>

<?php $this->layout('layout') ?>

<?php $this->start('components') ?>
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<?php $this->stop() ?>

<section class="what flex flex-column">
    <div class="flex-auto hero relative flex content-center justify-center items-center">
        <div id="hero-images">
            <amp-img src="/images/pages/home/portland-fog.jpeg" width="1000" height="667" layout="fill"></amp-img>
        </div>

        <div class="cover absolute b-gold"></div>
        <div class="cover-bottom absolute"></div>
        <div>
            <amp-layout layout="responsive" width="4" height="3" class="bg-white main-cta" sizes="(min-width: 450px) 450px, 100vw">
                <amp-fit-text max-font-size="50px" layout="flex-item" class="bg-darkblue white flex-auto center">
                    <div class="mx3">
                        September <span class="bold lightblue py2">14th</span> - <span class="bold lightblue">15th</span>
                    </div>
                </amp-fit-text>
                <amp-fit-text max-font-size="50px" layout="flex-item" class="flex-auto center darkblue">
                    <div class="mx3">
                        In the <span class="gold">❤</span> of <span class="bold">PDX Oregon</span>
                    </div>
                </amp-fit-text>
            </amp-layout>
        </div>
    </div>
    <div class="flex fold-cta bg-white darkblue justify-center">
        <div class="col md-col-4 sm-col-6 xs-hide my4 px3 border-right b-gravel b3 relative">
            <amp-fit-text max-font-size="50px" height="80px" layout="flex-item" class="flex-auto center">
                <span class="bold">2</span> days
            </amp-fit-text>
            <amp-fit-text max-font-size="50px" height="80px" layout="flex-item" class="flex-auto center md-hide lg-hide">
                <span class="bold">250+</span> tickets
            </amp-fit-text>
        </div>
        <div class="col col-4 sm-hide xs-hide my4 px3 border-right b-gravel b3 relative">
            <amp-fit-text max-font-size="50px" height="80px" layout="flex-item" class="flex-auto center">
                <span class="bold">250+</span> tickets
            </amp-fit-text>
        </div>
        <div class="col col-12 sm-col-6 sm-col-4 my4 px3 center flex flex-column justify-center">
            <a href="#" class="btn btn-cta large relative">
                <amp-fit-text max-font-size="50px" layout="fixed-height" height="50px"><strong>Register Now</strong></amp-fit-text>
            </a>
        </div>
    </div>
</section>
<section class="where bg-dark pb3">
    <h1 class="m0 p2 pt4 center bold white">Portland Oregon</h1>
    <div class="center pb2 white">Some subtext about Portland that is creative</div>

    <amp-carousel height="300" layout="fixed-height" type="carousel" class="bg-dark">
        <amp-img src="https://placeimg.com/400/300/arch" width="400" height="300" alt="a sample image"></amp-img>
        <amp-img src="https://placeimg.com/400/300/nature" width="400" height="300" alt="a sample image"></amp-img>
        <amp-img src="https://placeimg.com/400/300/people" width="400" height="300" alt="a sample image"></amp-img>
        <amp-img src="https://placeimg.com/400/300/tech" width="400" height="300" alt="a sample image"></amp-img>
    </amp-carousel>
</section>