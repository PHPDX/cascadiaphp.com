<?php
/** @var \PHPDX\Site\Template\Template $this */
?>
    <header class="main-header row">
        <div class="col-2 col-12-sm">
            <?php
            if (!isset($nologo) || !$nologo) {
                ?>
                <img class='header-logo' src="/images/logo.svg">
                <?php
            }
            ?>
        </div>
        <div class="col-9 col-12-sm nav">
            <?= $this->markdown('navigation') ?>
        </div>
        <script>
            (function() {
                var anchors = document.querySelectorAll('.nav > ul > li > a'), i, link;
                for (i in anchors) {
                    link = anchors[i];
                    if (link.pathname === document.location.pathname) {
                        link.className = 'active';
                    }
                }
            }());
        </script>
    </header>
<?php
