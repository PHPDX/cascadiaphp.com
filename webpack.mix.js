let mix = require('laravel-mix');

mix.setPublicPath('public')
mix
    .sass('resources/sass/theme/home.sass', 'public/packages/cascadiaphp/themes/cascadiaphp/css/home.css')
    .sass('resources/sass/theme/inner.sass', 'public/packages/cascadiaphp/themes/cascadiaphp/css/inner.css')

mix.disableNotifications()
