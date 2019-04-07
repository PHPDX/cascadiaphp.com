<?php

namespace CascadiaPHP\Site\Asset;

use Concrete\Core\Asset\Asset;
use Concrete\Core\Asset\CssAsset;
use const DIR_BASE;

class MixCssAsset extends CssAsset
{

    public function setAssetURL($url)
    {
        $mix = new Mix();
        $result = $mix(ltrim($url, '/'), DIR_BASE);
        if (substr($result, 0, 2) === '//') {
            $url = $result;
        }

        $this->assetURL = $url;
    }
}
