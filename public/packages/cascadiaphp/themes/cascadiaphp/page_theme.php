<?php

namespace Concrete\Package\Cascadiaphp\Theme\Cascadiaphp;

use Concrete\Core\Area\Layout\Preset\Provider\ThemeProviderInterface;
use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme implements ThemeProviderInterface
{

    protected $pThemeGridFrameworkHandle = 'bootstrap3';

    public function registerAssets()
    {
        $this->requireAsset('mix-css', 'cp/home');
        $this->requireAsset('javascript', 'cp/home');
        $this->requireAsset('javascript', 'jquery');
    }

    /**
     * @return array
     */
    public function getThemeAreaLayoutPresets()
    {
        $presets = [
            [
                'handle' => 'two_columns',
                'name' => 'Two Columns',
                'container' => '<div class="cp-layout flex"></div>',
                'columns' => [
                    '<div class="mr2 flex-1"></div>',
                    '<div class="ml2 flex-1"></div>',
                ],
            ],
            [
                'handle' => 'three_columns',
                'name' => 'Three Columns',
                'container' => '<div class="cp-layout flex flex-column flex-lg-row"></div>',
                'columns' => [
                    '<div class="mr3 mx0-md flex-1"></div>',
                    '<div class="mr1 mx0-md mx3 flex-1"></div>',
                    '<div class="ml3 mx0-md flex-1"></div>',
                ],
            ]
        ];

        return $presets;
    }

}
