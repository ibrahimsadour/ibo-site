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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

    mix.styles([
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/bootstrap-grid.css',
        'resources/assets/css/bootstrap-utilities.css'
    ],'public/css/bootstrap.css');
    
    mix.styles([
        'resources/assets/front/css/style.css',
        'resources/assets/css/util.css'
    ], 'public/assets/front/css/style.css');

    mix.styles([
        'resources/assets/css/style.css',
    ], 'public/css/style.css');