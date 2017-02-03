const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.eot',
    'public/fonts/bootstrap/glyphicons-halflings-regular.eot')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.svg',
    'public/fonts/bootstrap/glyphicons-halflings-regular.svg')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.ttf',
    'public/fonts/bootstrap/glyphicons-halflings-regular.ttf')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.woff',
    'public/fonts/bootstrap/glyphicons-halflings-regular.woff')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.woff2',
    'public/fonts/bootstrap/glyphicons-halflings-regular.woff2')
    .sass('app.scss')
    .webpack('app.js');
});
