<?php

use CascadiaPHP\Site\Console\ServiceProvider;

return [
    'assets' => [
        'cp/home' => [
            ['mix-css', 'themes/cascadiaphp/css/home.css', ['minify' => false], 'cascadiaphp'],
            ['javascript', 'themes/cascadiaphp/js/main.js', ['minify' => false], 'cascadiaphp'],
        ],
        'cp/inner' => [
            ['mix-css', 'themes/cascadiaphp/css/inner.css', ['minify' => false], 'cascadiaphp'],
            ['javascript', 'themes/cascadiaphp/js/main.js', ['minify' => false], 'cascadiaphp'],
        ]
    ],
    'providers' => [
        'foo' => ServiceProvider::class
    ]
];
