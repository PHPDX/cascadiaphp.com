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
<?php $this->stop() ?>

<div class="center">
    <h3>Subscribe to the CascadiaPHP Mailing List</h3>
    <form action-xhr="<?= $this->formUri('/actually/register') ?>" method="post" target="_top" class="validate">
        <div id="mc_embed_signup_scroll">
            <div class="hideaway absolute" aria-hidden="true">
                <input type="text" name="my_name" tabindex="-1" value="">
            </div>
            <div class="input-group">
                <input type="email" value="" name="email" class="email b1 rounded px2" placeholder="Email Address" required>
                <button class="btn btn-cta" name="subscribe" type="submit">Subscribe</button>
            </div>
        </div>
        <div submit-success>
            <template type="amp-mustache">
                Thanks for signing up! We'll reach out once we have more to tell!
            </template>
        </div>
        <div submit-error>
            <template type="amp-mustache">
                {{#error}}
                Subscription failed! Please reach out to <a href="mailto:leadership@cascadiaphp.com">leadership@cascadiaphp.com</a>
                {{/error}}{{message}}
            </template>
        </div>
    </form>
</div>
