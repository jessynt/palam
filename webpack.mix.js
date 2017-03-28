const {mix} = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

mix.copy(
    "node_modules/font-awesome/fonts",
    "public/fonts/font-awesome"
);
// less
mix.less('resources/assets/less/admin.less', 'public/css/admin/admin.css');
//sass
mix.sass('resources/assets/sass/admin/dashboard.scss', 'public/css/admin')
    .sass('resources/assets/sass/admin/plugins/editor.scss', 'public/css/admin');
mix.combine(['public/css/admin/admin.css', 'public/css/admin/dashboard.css'], 'public/css/admin/all.css');
mix.js('resources/assets/js/plugins/editor.js', 'public/js/admin')
    .js('resources/assets/js/dashboard.js', 'public/js/admin');

mix.sourceMaps();
