<?php declare(strict_types=1) ?>
<?php /** @var \CascadiaPHP\Site\Template\Template $this */ ?>
<?php
// Set the template
$this->layout('layout', [
    'active' => '/register'
]);

// Start the css section
$this->start('css');

// Echo out the stuff we want to be in the css section
echo $this->inline('/css/pages/register.css');

// Stop the css section
$this->stop();

$this->start('components'); ?>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
<?php $this->stop() ?>

<?php $this->start('header') ?>
<amp-analytics type="googleanalytics">
    <script type="application/json">
        {
            "vars": {
                "account": "UA-115467305-1"
            },
            "triggers": {
                "formSubmitSuccess": {
                    "on": "amp-form-submit-success",
                    "request": "event",
                    "vars": {
                        "eventCategory": "subscribe",
                        "eventAction": "subscribe-success"
                    }
                },
                "formSubmitError": {
                    "on": "amp-form-submit-error",
                    "request": "event",
                    "vars": {
                        "eventCategory": "subscribe",
                        "eventAction": "subscribe-error"
                    }
                }
            }
        }
    </script>
</amp-analytics>
<?php $this->stop() ?>

<div>
    <h1 class="m0 px3">Cascadia PHP</h1>
    <p class="px3">
        September 14th - 15th 2018<br>
        Portland Oregon
    </p>
    <amp-iframe
            sandbox="allow-scripts"
            height="500"
            layout="fixed-height"
            src="https://www.picatic.com/events/widget/203031?width=std"
            frameborder="0">
        <amp-fit-text layout="responsive" width="5" height="1" class="lightblue center" max-font-size="50px" placeholder></amp-fit-text>
    </amp-iframe>
</div>

<div class="flex-auto"></div>

<div class="center mb3">
    <h4 class="mt1">Sign up below or follow us on <a href="https://twitter.com/cascadiaphp">Twitter</a> for announcements</h4>
    <form action-xhr="<?= $this->formUri('/actually/register') ?>" method="post" target="_top" class="validate">
        <div submit-success>
            <template type="amp-mustache">
                Thanks for signing up! We'll reach out once we have more to tell! {{message}}
            </template>
        </div>
        <div submit-error>
            <template type="amp-mustache">
                Error: {{message}}
            </template>
        </div>
        <div id="mc_embed_signup_scroll">
            <div class="hideaway absolute" aria-hidden="true">
                <input type="text" name="my_name" tabindex="-1" value="">
            </div>
            <div class="input-group">
                <input type="email" value="" name="email" class="email b1 rounded px2" placeholder="Email Address" required>
                <button class="btn btn-cta" name="subscribe" type="submit">Subscribe</button>
            </div>
        </div>
    </form>
</div>
