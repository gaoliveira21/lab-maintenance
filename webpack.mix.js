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
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/views/assets/css/datatables.css'
    ], 'public/css/datatables.css')
    .styles([
        'resources/views/assets/css/styles.css'
    ], 'public/css/styles.css')
    .scripts([
        'resources/views/assets/js/datatables/index.js',
    ], 'public/js/datatables/index.js')
    .scripts([
        'resources/views/assets/js/datatables/labs.js'
    ], 'public/js/datatables/labs.js');
