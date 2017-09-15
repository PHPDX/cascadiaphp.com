<?php
/** @var \League\Plates\Template\Template $this */
$this->layout('layout', ['title' => 'PDXPHP Usergroup']);
?>

<div class="row">
    <div class="col-12 center">
        <div class="logo img center">
            <img src="/images/logo.svg">
        </div>
        <p>
            PHPDX is a <strong>Portland Oregon</strong> based PHP user group that has been running since at least 2010. <br>
            We meet <strong>twice every month</strong> and host a <strong>PHP conference</strong> every year.
        </p>
    </div>
</div>
<div class="row spacer" style="min-height:100px"></div>
<div class="row center">
    <div class="col-3-sm"></div>
    <div class="col-2-sm">
        <a href="https://www.meetup.com/PDX-PHP/">Meetup</a>
    </div>
    <div class="col-2-sm">
        <a href="https://twitter.com/phpdx">Twitter</a>
    </div>
    <div class="col-2-sm">
        <a href="https://php.ug/slackinvite">Slack <strong>#phpdx</strong></a>
    </div>
</div>
<div class="footer-floater center">
    Copyright &copy; <?= $this->e(date('Y')); ?> PHPDX &nbsp;
    Version: <span><?= $this->e(strtoupper(substr(getenv('hash'), 0, 8))); ?></span>
</div>
