<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$this->layout('layout', [
    'title' => 'Subscribe to our Mailing List',
    'url' => '/subscribe',
    'active' => '/'
]);
?>

<?php $this->start('components') ?>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<?php $this->end() ?>

<?php $this->start('css') ?>
<?= $this->inline('/css/pages/subscribe.css') ?>
<?php $this->end() ?>

<div class="container main">
    <section class="main-cta">
        <div class="item item-top"></div>
        <div class="item text-center main-item align-middle">
            <a href="/" class="go-back">&lt; Go Back</a>

            <form action-xhr="<?= $this->formUri('/actually/subscribe') ?>" method="post" target="_top" class="validate">
                <div id="mc_embed_signup_scroll">
                    <?= $this->markdown('subscribe') ?>

                    <div class="hideaway" aria-hidden="true">
                        <input type="text" name="my_name" tabindex="-1" value="">
                    </div>

                    <div class="input-group">
                        <input type="email" value="" name="email" class="email border rounded" placeholder="Email Address" required>
                        <button class="pure-button pure-button" name="subscribe" type="submit">Subscribe</button>
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

            <!--End mc_embed_signup-->
        </div>
        <div class="item item-bottom"></div>
    </section>
</div>
