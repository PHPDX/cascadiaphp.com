<?php declare(strict_types = 1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php $this->start('components') ?>
<?php $this->stop() ?>
<section class="what flex flex-column mx2 mb2">
    <div class="flex-auto hero relative flex content-center justify-center items-center">
        <div id="hero-images">
            <amp-img width="1000" height="667" layout="fill" class="object-cover"
                     srcset="/images/scenes/what/mthood.jpg 2000w,
                             /images/scenes/what/mthood-large.jpg 1440w,
                             /images/scenes/what/mthood-medium.jpg 900w,
                             /images/scenes/what/mthood-smaller.jpg 680w,
                             /images/scenes/what/mthood-smallest.jpg 440w"
                     alt="A super far away picture of mount hood with the mountain centered. This image lays in the background behind the shape of oregon"
            >
            </amp-img>
        </div>

        <div class="cover absolute shadow"></div>
        <div class="cover-bottom absolute"></div>
        <amp-layout layout="responsive" width="276.02" height="191.15" class="main-cta flex-auto">
            <div class="flex flex-column justify-bottom relative flex-auto justify-end">
                <amp-img src="/images/scenes/what/oregon.svg" layout="fill" class="object-contain" width="276.02" height="191.15" alt="The shape of oregon, the top half is blue and the bottom half is white"></amp-img>
                <amp-fit-text max-font-size="50px" layout="responsive" width="216.79" height="65.75" class="white center">
                    <div class="mx3 py2 px2">
                        <span class="sm-col sm-col-12 text-shadow">September</span> <span class="bold lightblue py2 text-shadow">19th</span> - <span class="bold lightblue text-shadow">21st</span>
                        <span class="sm-col sm-col-12">2019</span>
                    </div>
                </amp-fit-text>
                <amp-fit-text max-font-size="50px" layout="responsive" width="216.79" height="65.75" class="center darkblue">
                    <div class="mx3 py2 px2">
                        <span class="sm-col sm-col-12 text-shadow">In the <span class="gold">❤</span> of</span> <span class="bold text-shadow">PDX Oregon</span>
                    </div>
                </amp-fit-text>
            </div>
        </amp-layout>
    </div>

    <div class="fold-cta bg-darkblue white justify-between px3 py4 mt2 sm-m0 xs-m0 md-py1 sm-py1 xs-py1">
        <div class="flex flex-column md-col-6 lg-col-7 md-col lg-col">
            <amp-fit-text layout="fixed-height" class="mr3 sm-m0 xs-m0 center" max-font-size="40px" height="80px">
                <strong class="gold bold-text text-shadow">3</strong> <span class="light-text">days &</span>
                <span class="nowrap"><strong class="gold bold-text text-shadow">~35</strong> <span class="light-text">speakers</span></span>
            </amp-fit-text>
        </div>
        <div class="center md-col-6 lg-col-5 md-col-right lg-col-right center">
            <div class="flex btn-group">
                <?php /*
                <a href="/register" class="btn btn-darkblue b-gold large relative">
                    <amp-fit-text max-font-size="60px" min-font-size="20px" layout="fixed-height" height="50px" sizes="80px">
                        <strong class="bold-text white nowrap">$ TBA</strong>
                    </amp-fit-text>
                </a>
 */ ?>
                <a href="https://twitter.com/cascadiaphp" target="_blank" class="btn btn-cta large relative flex-auto rounded">
                    <amp-fit-text max-font-size="60px" min-font-size="20px" layout="fixed-height" height="50px">
                        <strong class="light-text">Follow us on Twitter for Announcements</strong>
                    </amp-fit-text>
                </a>
            </div>
        </div>
    </div>
</section>

