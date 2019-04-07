<?php

namespace CascadiaPHP\Site\Asset;

use Concrete\Core\Asset\Asset;
use Concrete\Core\Asset\CssAsset;
use Concrete\Core\Asset\JavascriptAsset;
use const DIR_BASE;

class MixJsAsset extends JavascriptAsset
{
    /**
     * @param Asset[] $assets
     *
     * @return \CascadiaPHP\Site\Asset\MixJsAsset[]
     * @throws \Exception
     */
    public static function process($assets)
    {
        $assets = parent::process($assets);

        $mix = new Mix();

        foreach ($assets as &$asset) {
            self::checkMix($mix, $asset);
        }

        return $assets;
    }

    /**
     * Replace with mix version if one exists
     *
     * @param \CascadiaPHP\Site\Asset\Mix $mix
     * @param \CascadiaPHP\Site\Asset\MixJsAsset $asset
     *
     * @throws \Exception
     */
    private static function checkMix(Mix $mix, MixJsAsset $asset)
    {
        $path = $asset->getAssetPath();
        $mixPath = $mix($path, DIR_BASE);

        if ($path !== $mixPath) {
            $asset->setAssetPath();
        }
    }

}
