<?php

use CascadiaPHP\Site\Asset\MixCssAsset;
use CascadiaPHP\Site\Asset\MixJsAsset;

defined('C5_EXECUTE') or die('Access Denied.');

# Load in the composer vendor files
require_once __DIR__ . '/../../../vendor/autoload.php';

# Try loading in environment info
$env = new \Dotenv\Dotenv(__DIR__ . '/../../../');
try {
    $env->overload();
} catch (\Exception $e) {
    // Ignore any errors
}

# Add the vendor directory to the include path
ini_set('include_path', __DIR__ . '/../../../vendor' . PATH_SEPARATOR . get_include_path());

# Didn't see a simpler way to do this
class_alias(MixCssAsset::class, \Concrete\Core\Asset\MixCssAsset::class);
class_alias(MixJsAsset::class, \Concrete\Core\Asset\MixJsAsset::class);
