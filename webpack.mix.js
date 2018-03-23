let mix = require('laravel-mix'),
    replaceImportant = require('replace-important')

mix.setPublicPath('./public');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/pages/subscribe.scss', 'public/css/pages');

