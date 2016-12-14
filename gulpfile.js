const elixir = require('laravel-elixir');
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

elixir(mix => {
    mix
        .copy(
            "node_modules/font-awesome/fonts",
            "public/fonts/font-awesome"
        )
        .less('Admin.less', 'resources/assets/dist/admin/Admin.css')
        .sass('admin/dashboard.scss', 'resources/assets/dist/admin/dashboard.css')
        .sass('admin/plugins/editor.scss', 'public/css/admin/editor.css')

        .styles([
            'resources/assets/dist/admin/Admin.css',
            'resources/assets/dist/admin/dashboard.css'
        ], 'public/css/admin/dashboard.css', './')

        //Admin
        .webpack('plugins/editor.js', 'public/js/admin/editor.js')
        .webpack('dashboard.js', 'public/js/admin/dashboard.js')

        .version(['public/css/admin/dashboard.css', 'public/js/admin/dashboard.js'])
});
