<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php

$this->start('components');
?>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
<script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>
<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<?php
$this->stop();
?>

<amp-state id="state">
    <script type="application/json">
        <?= $json = $this->inline('/data/speakers.json') ?>
    </script>
</amp-state>

<h1 class="my0 cubes pb2 pt3 border-bottom b2 b-gold bg-white px3 darkblue">Speakers</h1>

<div class="speakers mb0">
    <div class="bg-gold caps px3 py2 white text-shadow">Keynotes</div>

    <?php $speakers = json_decode($json, true) ?>
    <div class="speaker-container">
        <?php foreach ($speakers['speakers'] as $speaker): ?>
            <?php if (!($speaker['name'] ?? '')) continue ?>
            <div class="col-12 sm-col-6 md-col-4 lg-col-2 py2 speaker <?= $speaker['keynote'] ? 'bg-gold' : '' ?> flex-item" tabindex="0" on="tap:AMP.setState({current: <?= $speaker['id'] ?? 0 ?>})<?=  $speaker['bio'] || $speaker['description'] ? ', talk-info.open' : '' ?>" role="button">
                <amp-layout width="1" height="1" layout="responsive" class="circle bg-blue cloth relative shadow-lg m2">
                    <amp-img layout="fill"
                             src="<?= $speaker['avatar'] ?? '' ?>"
                             width="255"
                             height="255"
                             class="object-cover object-right"
                             alt="<?= $speaker['name'] ?>: <?= $speaker['talk'] ?? 'To Be Announced'?>">

                        <amp-img alt="CascadiaPHP Logo"
                                 class="m2"
                                 fallback
                                 layout="responsive"
                                 width="765" height="78"
                                 src="/images/logo.svg"></amp-img>
                    </amp-img>
                </amp-layout>
                <div class="relative col-12 center pt2">
                    <span class="light-text <?= $speaker['keynote'] ? 'white text-shadow' : '' ?> block nowrap">
                        <?= $speaker['name'] ?>
                    </span>

                    <?php if ($speaker['twitter']): ?>
                    <h5 class="m0">
                        <a class="italic <?= $speaker['keynote'] ? 'white text-shadow' : '' ?>" href="https://twitter.com/<?= $speaker['twitter'] ?>/">
                            <?= $speaker['twitter'] ?>
                        </a>
                    </h5>
                    <?php endif ?>

                    <?php if ($speaker['company']): ?>
                        <amp-fit-text layout="fixed-height" height="20px" max-font-size="13px" class="light-text <?= $speaker['keynote'] ? 'bg-light black' : 'bg-blue white' ?> block nowrap rounded mx1 my1">
                            <?= $speaker['company'] ?>
                        </amp-fit-text>
                    <?php endif ?>

                    <span class="bold-text px1 <?= $speaker['keynote'] ? 'white text-shadow' : '' ?> block">
                        <?php if ($talk = array_get($speaker, 'talk')): ?>
                            <?= $talk ?>
                        <?php else: ?>
                            To Be Announced
                        <?php endif ?>
                    </span>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <?= $this->insert('fragment/speaker/modal') ?>

</div>
