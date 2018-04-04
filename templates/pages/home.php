<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>

<?php $this->layout('layout', [
    'page' => '/home',
    'title' => 'Cascadia PHP Conference in Portland Oregon - Cascadia PHP'
]) ?>

<?php $this->start('components') ?>
<?php $this->stop() ?>

<section class="what flex flex-column">
    <div class="flex-auto hero relative flex content-center justify-center items-center">
        <div id="hero-images">
            <amp-img width="1000" height="667" layout="fill"
                     srcset="/images/scenes/what/mthood.jpg 2000w,
                             /images/scenes/what/mthood-large.jpg 1440w,
                             /images/scenes/what/mthood-medium.jpg 900w,
                             /images/scenes/what/mthood-smaller.jpg 680w,
                             /images/scenes/what/mthood-smallest.jpg 440w"
                     alt="A super far away picture of mount hood with the mountain centered. This image lays in the background behind the shape of oregon"
            >

            </amp-img>
        </div>
 g
        <div class="cover absolute"></div>
        <div class="cover-bottom absolute"></div>
        <div>
            <amp-layout layout="responsive" width="276.02" height="191.15" class="main-cta relative" sizes="(min-width: 600px) 600px, 100vw">
                <amp-img src="/images/scenes/what/oregon.svg" layout="fill" width="276.02" height="191.15" alt="The shape of oregon, the top half is blue and the bottom half is white"></amp-img>
                <amp-fit-text max-font-size="50px" layout="responsive" width="216.79" height="65.75" class="white center">
                    <div class="mx3 py2 px2">
                        <span class="sm-col sm-col-12">September</span> <span class="bold lightblue py2">14th</span> - <span class="bold lightblue">15th</span>
                    </div>
                </amp-fit-text>
                <amp-fit-text max-font-size="50px" layout="responsive" width="216.79" height="65.75" class="center darkblue">
                    <div class="mx3 py2 px2">
                        <span class="sm-col sm-col-12">In the <span class="gold">❤</span> of</span> <span class="bold">PDX Oregon</span>
                    </div>
                </amp-fit-text>
            </amp-layout>
        </div>
    </div>

    <div class="fold-cta bg-darkblue white justify-between px3 py4 sm-m0 xs-m0 md-py1 sm-py1 xs-py1">
        <div class="flex flex-column md-col-6 lg-col-7 md-col lg-col">
            <amp-fit-text layout="fixed-height" class="mr3 sm-m0 xs-m0 center" max-font-size="40px" height="80px">
                <strong class="gold bold-text">2</strong> <span class="light-text">days &</span>
                <span class="nowrap"><strong class="gold bold-text">25+</strong> <span class="light-text">speakers</span></span>
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
                <a href="/register" class="btn btn-cta large relative flex-auto rounded">
                    <amp-fit-text max-font-size="60px" min-font-size="20px" layout="fixed-height" height="50px">
                        <strong class="light-text">register now</strong>
                    </amp-fit-text>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="where bg-slate white sm-m0 xs-m0 p3 relative">
    <amp-img src="/images/scenes/where/bridge-partial.svg" layout="fill" class="object-left object-contain" alt="A semitransparent logo image"></amp-img>
    <amp-fit-text layout="fixed-height" height="160px" class="my3">
        <span class="nowrap bold-text">Cascadia PHP 2018</span><br>
        <span class="nowrap light-text">Portland, Oregon</span>
    </amp-fit-text>
    <div class="md-flex where-row">
        <div class="md-col md-col-6 lg-col-4 col-12 flex flex-column image-grid ml3 xs-m0 sm-m0">
            <amp-fit-text layout="fixed-height" height="50px" class="center" max-font-size="30px">
                <span class="nowrap light-text center">keep portland <strike class="light-text">weird</strike> php<strong class="gold">*</strong></span>
            </amp-fit-text>
            <?php
            $srcset = function($source, $suffix = '.jpg') {
                $set = ['1x' => '@1x', '0.75x' => '@0,75x', '0.5x' => '@0,5x', '0.25x' => '@0,25x'];
                $items = [];
                foreach ($set as $size => $img) {
                    $items[] = $source . $img . $suffix . ' ' . $size;
                }
                return implode(',', $items);
            }
            ?>
            <div class="flex relative flex-auto">
                <div class="flex-auto relative mr1">
                    <amp-img class="object-center object-cover rounded bg-gravel" layout="fill" width="1000" height="668" srcset="<?= $srcset('/images/scenes/where/portland-sign') ?>"></amp-img>
                </div>
                <div class="flex-auto flex flex-column">
                    <div class="flex-auto relative mb1">
                        <amp-img class="object-center object-cover rounded bg-gravel" layout="fill" width="4" height="3" src="/images/scenes/where/pipes.gif"></amp-img>
                    </div>
                    <div class="flex-auto relative">
                        <amp-img class="object-center object-cover rounded bg-gravel" layout="fill" width="4" height="3" srcset="<?= $srcset('/images/scenes/where/portland-ohsu') ?>"></amp-img>
                    </div>
                </div>
            </div>
            <div class="flex relative flex-auto mt1">
                <div class="flex-auto flex flex-column">
                    <div class="flex-auto relative mb1">
                        <amp-img class="object-center object-cover rounded bg-gravel" layout="fill" width="4" height="3" srcset="<?= $srcset('/images/scenes/where/portland-convention-center') ?>"></amp-img>
                    </div>
                    <div class="flex-auto relative">
                        <amp-img class="object-top object-cover rounded bg-gravel" layout="fill" width="4" height="3" srcset="<?= $srcset('/images/scenes/where/portland-mthood') ?>"></amp-img>
                    </div>
                </div>
                <div class="flex-auto relative ml1">
                    <amp-img class="object-center object-cover rounded bg-gravel" layout="fill" width="1" height="1" srcset="<?= $srcset('/images/scenes/where/portland-falls') ?>"></amp-img>
                </div>
            </div>
        </div>

        <div class="lg-col md-hide lg-col-4 col-12 pt3 ml3 xs-m0 sm-m0">
            <p>
                The Pacific Northwest (also known as Cascadia) is a magical land covered in Rain Forests, Deserts, Coasts,
                Mountains, Rivers, and People. It's expansive forests have traditionally powered the industries in this area,
                but with the last century, more and more it has had a focus on Tech.
            </p>
            <p>
                Businesses in this area embraced the web when it was in its infancy, and has a huge community of PHP users
                because of it.
            </p>
        </div>
        <div class="lg-col lg-col-4 md-col md-col-6 col-12 pt3">
            <p>
                Portland Oregon is the most amazing mix of People, Technology, Nature, Architecture and Art. You will find it
                challenging to walk down the street without the opportunity to meet someone awesome. Portland is a booming tech
                town with PHP at its heart.
            </p>
            <p>
                We have come together to form a non profit organization to run this conference and bring the PHP community to
                the Portland community, and to expose our community to some of the local businesses powered by PHP.
            </p>
            <div class="lg-hide">
                <p>
                    The Pacific Northwest (also known as Cascadia) is a magical land covered in Rain Forests, Deserts, Coasts,
                    Mountains, Rivers, and People. It's expansive forests have traditionally powered the industries in this area,
                    but with the last century, more and more it has had a focus on Tech.
                </p>
                <p>
                    Businesses in this area embraced the web when it was in its infancy, and has a huge community of PHP users
                    because of it.
                </p>
            </div>
        </div>
<!--
        <div class="col col-4 flex flex-column">
            <span>Keep Portland Weird</span>
            <amp-layout width="4" height="3" layout="responsive">
                <div class="flex">
                    <amp-layout width="4" height="4" layout="responsive">
                    </amp-layout>
                    <div class="flex flex-column">

                        <amp-layout width="4" height="3" layout="responsive" class="bg-gravel">
                        </amp-layout>

                        <amp-layout width="4" height="3" layout="responsive" class="bg-gravel">
                        </amp-layout>
                    </div>
                </div>
            </amp-layout>
            <amp-layout width="4" height="3" layout="responsive">
                <amp-img width="1" height="1" src="<?= $this->placeholder(100, 100) ?>"></amp-img>
            </amp-layout>
        </div>
        -->
        <div class="clearfix"></div>
    </div>
</section>
