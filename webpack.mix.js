let mix = require('laravel-mix'),
    replaceImportant = require('replace-important'),
    fs = require('fs'),
    pages = [];

// Add a simple way to add pages
mix.page = function(page) {
    pages.push('resources/css/pages/' + page + '.css');
    return this.sass('resources/sass/pages/' + page + '.sass', 'resources/css/pages');
};

// Build pages
mix
    .page('venue')
    .page('brand')
    .page('home')
    .page('sponsors')
    .page('register')
    .page('legal')
    .page('speakers')
    .page('schedule');

// Post process pages with replaceimportant
mix.then(function() {
    pages.forEach(function(page) {
        fs.readFile(page, function(error, contents) {
            fs.writeFile(page, replaceImportant(contents));
        })
    });

    console.log('Replaced !important');
});
