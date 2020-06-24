const { mix } = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.combine([
    'public/site/js/jquery-3.2.1.min.js',
    'public/site/js/popper.js',
    'public/site/js/bootstrap.min.js',
    'public/site/js/index.js',
    'public/site/js/imagesViews.js',
    'public/site/js/inbox.js',
    'public/site/js/myads.js',
    'public/site/js/projects.js',
], 'public/js/all.merged.js')
mix.minify('public/js/all.merged.js');

mix.combine([
    'public/site/css/bootstrap.css',
    'public/site/css/bootstrap.min.css',
    'public/site/css/font-awesome.min.css',
], 'public/css/all.merged.css');
mix.minify('public/css/all.merged.css');