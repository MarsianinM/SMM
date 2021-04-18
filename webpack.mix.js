const mix = require('laravel-mix');

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

mix.js('resources/frontend/js/scripts.min.js', 'public/frontend/js')
    .sass('resources/frontend/scss/main.scss', 'public/frontend/css/main.min.css')
    .css('resources/frontend/css/max.css', 'public/frontend/css/main.min.css')
    .sourceMaps();
