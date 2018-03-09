let mix = require('laravel-mix');

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

mix.sass('resources/sass/small.scss', 'public/css');
mix.sass('resources/sass/vendor.scss', 'public/css');

mix.version();
