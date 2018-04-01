<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>

<?php $this->layout('layout', [
    'page' => '/home',
    'title' => 'Cascadia PHP Conference in Portland Oregon - Cascadia PHP'
]) ?>

<?php $this->start('components') ?>
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<?php $this->stop() ?>

<section class="what flex flex-column">
    <div class="flex-auto hero relative flex content-center justify-center items-center">
        <div id="hero-images">
            <amp-img src="/images/scenes/where/mthood.jpg" width="1000" height="667" layout="fill"></amp-img>
        </div>

        <div class="cover absolute b-gold"></div>
        <div class="cover-bottom absolute"></div>
        <div>
            <amp-layout layout="responsive" width="4" height="3" class="bg-white main-cta" sizes="(min-width: 450px) 450px, 100vw">
                <amp-fit-text max-font-size="50px" layout="flex-item" class="bg-darkblue white flex-auto center">
                    <div class="mx3">
                        September<br><span class="bold lightblue py2">14th</span> - <span class="bold lightblue">15th</span>
                    </div>
                </amp-fit-text>
                <amp-fit-text max-font-size="50px" layout="flex-item" class="flex-auto center darkblue">
                    <div class="mx3">
                        In the <span class="gold">❤</span> of <br><span class="bold">PDX Oregon</span>
                    </div>
                </amp-fit-text>
            </amp-layout>
        </div>
    </div>
    <div class="flex fold-cta bg-white darkblue justify-center">
        <div class="col md-col-4 sm-col-6 xs-hide my4 px3 border-right b-gravel b3 relative">
            <amp-fit-text max-font-size="40px" height="80px" layout="flex-item" class="flex-auto center">
                <span class="bold">2</span> days
            </amp-fit-text>
            <amp-fit-text max-font-size="40px" height="80px" layout="flex-item" class="flex-auto center md-hide lg-hide">
                <span class="bold">25+</span> speakers
            </amp-fit-text>
        </div>
        <div class="col col-4 sm-hide xs-hide my4 px3 border-right b-gravel b3 relative">
            <amp-fit-text max-font-size="40px" height="80px" layout="flex-item" class="flex-auto center">
                <span class="bold">25+</span> speakers
            </amp-fit-text>
        </div>
        <div class="col col-12 sm-col-6 sm-col-4 my4 px3 center flex flex-column justify-center">
            <a href="/register" class="btn btn-cta large relative">
                <amp-fit-text max-font-size="40px" layout="fixed-height" height="50px"><strong>Register Now</strong></amp-fit-text>
            </a>
        </div>
    </div>
</section>
<section class="where bg-dark">
    <h1 class="m0 p2 pt4 center bold white">Portland Oregon</h1>
    <div class="center pb2 white">Keep Portland <strike>Weird</strike> <strong>PHP*</strong></div>

    <amp-carousel height="300" layout="fixed-height" type="carousel" class="bg-dark">
        <amp-img src="https://placeimg.com/400/300/arch" width="400" height="300" alt="a sample image"></amp-img>
        <amp-img src="https://placeimg.com/400/300/nature" width="400" height="300" alt="a sample image"></amp-img>
        <amp-img src="https://placeimg.com/400/300/people" width="400" height="300" alt="a sample image"></amp-img>
        <amp-img src="https://placeimg.com/400/300/tech" width="400" height="300" alt="a sample image"></amp-img>
    </amp-carousel>

    <div class="md-flex lg-flex">
        <div class="p3 center items-center justify-center flex flex-column flex-auto white">
            <p>
            Portland Oregon is the most amazing mix of People, Technology, Nature, Architecture and Art. You will find it
            challenging to walk down the street without the opportunity to meet someone awesome. Portland is a booming tech
            town with PHP at its heart.<br>
            We have come together to form a non profit organization to run this conference and bring the PHP community to
            the Portland community, and to expose our community to some of the local businesses powered by PHP.
            </p>
        </div>

        <div class="p3 center flex-auto items-center justify-center flex flex-column darkblue bg-gravel">
            <p>
            The Pacific Northwest (also known as Cascadia) is a magical land covered in Rain Forests, Deserts, Coasts,
            Mountains, Rivers, and People. It's expansive forests have traditional powered the industries in this area,
            but with the last century, more and more it has had a focus on Tech.<br>
            Businesses in this area embraced the web when it was in its infancy, and has a huge community of PHP users
            because of it.
            </p>
        </div>
    </div>
</section>