<?php

use CascadiaPHP\Site\Asset\MixCssAsset;
use Concrete\Core\Application\Application;
use Concrete\Core\Asset\CssAsset;

/*
 * ----------------------------------------------------------------------------
 * Instantiate concrete5
 * ----------------------------------------------------------------------------
 */
$app = new Application();

/*
 * ----------------------------------------------------------------------------
 * Detect the environment based on the hostname of the server
 * ----------------------------------------------------------------------------
 */
$app->detectEnvironment(
    array(
        'local' => array(
            'hostname',
        ),
        'production' => array(
            'live.site',
        ),
    ));


$app->bind(CssAsset::class, MixCssAsset::class);

return $app;
