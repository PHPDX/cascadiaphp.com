<?php
/** @var \CascadiaPHP\Site\Template\Template $this */
$this->layout('layout', [
    'title' => 'Cascadia PHP',
    'active' => '/'
]);
?>

<div class="container main">
    <section class="main-cta">
        <div class="item item-top"></div>
        <div class="item text-center">
            <form action="https://cascadiaphp.us12.list-manage.com/subscribe/post?u=96f7d4c53c8572ecc4280e249&amp;id=60fb4ba7b8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate pure-form" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <?= $this->markdown('subscribe') ?>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_96f7d4c53c8572ecc4280e249_60fb4ba7b8" tabindex="-1" value=""></div>

                    <div class="input-group mb-3">
                        <input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="Email Address" required>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" name="subscribe" type="submit">Subscribe</button>
                        </div>
                    </div>
                </div>
            </form>

            <!--End mc_embed_signup-->
        </div>
        <div class="item item-bottom"></div>
    </section>
</div>