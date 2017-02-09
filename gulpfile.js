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
    // bootstrap-fonts
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/',
    'public/fonts/bootstrap/')
    // wangeditor css, js, fonts
    .copy('node_modules/wangeditor/dist/css/wangEditor.min.css',
    'public/css/wangEditor.min.css')
    .copy('node_modules/wangeditor/dist/js/wangEditor.min.js',
    'public/js/wangEditor.min.js')
    .copy('node_modules/wangeditor/dist/fonts/',
    'public/fonts/')
    .sass('app.scss')
    .webpack('app.js');
});
