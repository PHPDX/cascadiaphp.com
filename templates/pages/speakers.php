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
        <?= $this->inline('/data/speakers.json') ?>
    </script>
</amp-state>

<h1 class="my0 cubes pb2 pt3 border-bottom b2 b-gold bg-white px3 darkblue">Speakers</h1>

<div class="speakers mb0">
    <div class="bg-gold caps px3 py2 white text-shadow">Keynotes</div>
    <amp-list layout="fixed-height"
              height="2000px"
              class="speaker-container relative"
              src="<?= $this->formUri('/data/speakers.json') ?>">

        <template type="amp-mustache">

            {{#name}}
                <div class="col-12 sm-col-6 md-col-4 lg-col-2 py2 speaker {{#keynote}}bg-gold{{/keynote}} flex-item" on="tap:AMP.setState({current: {{id}} })<?php /*, talk-info.open*/ ?>" role="button" tabindex="1">
                    <amp-layout width="1" height="1" layout="responsive" class="circle bg-blue cloth relative shadow-lg m2">
                        <amp-img layout="fill"
                                 src="{{#avatar}}{{ avatar }}{{/avatar}}"
                                 width="255"
                                 height="255"
                                 class="object-cover object-right"
                                 alt="{{ name }}: {{#talk}}{{ talk }}{{/talk}}{{^talk}}To Be Announced{{/talk}}">

                            <amp-img alt="CascadiaPHP Logo"
                                     class="m2"
                                     fallback
                                     layout="responsive"
                                     width="765" height="78"
                                     src="/images/logo.svg"></amp-img>
                        </amp-img>
                    </amp-layout>
                    <div class="relative col-12 center pt2">
                        <span class="light-text {{#keynote}}white text-shadow{{/keynote}} block nowrap">{{ name }}</span>
                        {{#company}}<amp-fit-text layout="fixed-height" height="20px" max-font-size="13px" class="light-text {{#keynote}}white text-shadow{{/keynote}} block nowrap rounded mx1 bg-blue white my1">{{ company }}</amp-fit-text>{{/company}}
                        <span class="bold-text px1 {{#keynote}}white text-shadow{{/keynote}} block">
                            {{#talk}}
                                {{ talk }}
                            {{/talk}}
                            {{^talk}}
                                To Be Announced
                            {{/talk}}
                        </span>
                    </div>
                </div>
            {{/name}}

        </template>
    </amp-list>

    <amp-lightbox id="talk-info" layout="nodisplay">
        <amp-layout
                layout="responsive"
                width="3"
                height="2"
                class="bg-gravel modal shadow-lg"
                on="tap:talk-info.close"
                role="button"
                tabindex="0">
            <div class="modal-content flex flex-row">
                <section class="speaker-bio p3 flex-item flex-auto">
                    <amp-layout height=1 width=1 layout="responsive" class="circle bg-blue cloth relative shadow-lg mx-auto">
                        <amp-img layout="fill"
                                 [src]="state.speakers[current].avatar"
                                 src="/images/logo.svg"
                                 width="255"
                                 height="255"
                                 class="object-cover object-right"
                                 alt="{{ name }}: {{#talk}}{{ talk }}{{/talk}}{{^talk}}To Be Announced{{/talk}}">

                            <amp-img alt="CascadiaPHP Logo"
                                     class="m2"
                                     fallback
                                     layout="responsive"
                                     width="765" height="78"
                                     src="/images/logo.svg"></amp-img>
                        </amp-img>
                    </amp-layout>
                    <p [text]="state.speakers[current].bio">dero</p>
                </section>
                <section class="talk-info p3 bg-dark light flex-item flex-auto">
                    <p [text]="state.speakers[current].talk"></p>
                    <p [text]="state.speakers[current].description"></p>
                </section>
            </div>
        </amp-layout>
    </amp-lightbox>

</div>
