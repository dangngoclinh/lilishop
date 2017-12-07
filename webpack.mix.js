let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/breadcrumbs.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');
mix.sass('resources/assets/sass/breadcrumbs.scss', 'public/css');
/*mix.copy('vendor/bower_dl/font-awesome/css/font-awesome.css', 'public/css/font-awesome.css');*/

mix.styles([
    'resources/assets/kidslife/style.css',
    'resources/assets/kidslife/css/shortcodes.css',
    'resources/assets/kidslife/css/responsive.css',
    'public/css/custom.css',
], 'public/css/all.css');
