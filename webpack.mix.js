let mix = require('laravel-mix'),
    replaceImportant = require('replace-important'),
    fs = require('fs')

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
    .sass('resources/sass/app.sass', 'resources/css')
    .sass('resources/sass/basscss.sass', 'resources/css')
    .sass('resources/sass/pages/subscribe.sass', 'resources/css/pages')
    .sass('resources/sass/pages/home.sass', 'resources/css/pages');;


mix.then(function() {
    fs.readFile('resources/css/basscss.css', function(error, contents) {
        fs.writeFile('resources/css/basscss.css', replaceImportant(contents));
    })
});
