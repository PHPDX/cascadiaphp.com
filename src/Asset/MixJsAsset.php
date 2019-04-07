<?php

namespace CascadiaPHP\Site\Asset;

use Concrete\Core\Asset\Asset;
use Concrete\Core\Asset\CssAsset;
use Concrete\Core\Asset\JavascriptAsset;
use const DIR_BASE;

class MixJsAsset extends JavascriptAsset
{
    public function setAssetURL($url)
    {
        $mix = new Mix();
        $result = (string) $mix(ltrim($url, '/'), DIR_BASE);
        if (substr($result, 0, 2) === '//') {
            $url = $result;
        }

        $this->assetURL = $url;
    }
}
