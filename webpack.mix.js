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
    .sass('resources/sass/pages/brand.sass', 'resources/css/pages')
    .sass('resources/sass/pages/home.sass', 'resources/css/pages');


// Post process css with replaceimportant
mix.then(function() {

    fs.readdir('resources/css/pages', function(error, pages) {
        pages.forEach(function(page) {
            fs.readFile('resources/css/pages/' + page, function(error, contents) {
                fs.writeFile('resources/css/pages/' + page, replaceImportant(contents));
            })
        })
    });
});
