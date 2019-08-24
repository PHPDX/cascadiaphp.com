let mix = require('laravel-mix')

mix.webpackConfig({
    externals: {
        "jquery": "jQuery"
    }
})

mix.setPublicPath('public')
mix
    .js('resources/js/main.js', 'public/packages/cascadiaphp/themes/cascadiaphp/js/main.js')
    .sass('resources/sass/theme/home.sass', 'public/packages/cascadiaphp/themes/cascadiaphp/css/home.css')
    .sass('resources/sass/theme/inner.sass', 'public/packages/cascadiaphp/themes/cascadiaphp/css/inner.css')

mix.disableNotifications()
