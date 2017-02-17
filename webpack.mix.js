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

mix.js('resources/assets/js/app.js', 'public/js');
mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.extract(['jquery', 'vue']);

mix.copy('resources/assets/tinymce/', 'public/js/tinymce/', false);
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/js/tinymce/tinymce.min.js', false);
mix.copy('node_modules/tinymce/plugins/', 'public/js/tinymce/plugins/', false);
mix.copy('node_modules/tinymce/themes/', 'public/js/tinymce/themes/', false);
mix.copy('node_modules/tinymce/skins/', 'public/js/tinymce/skins/', false);
