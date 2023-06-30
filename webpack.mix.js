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
    .scripts('resources/user_assets/js/core.js', 'public/user_assets/js/core.js')
    .js('resources/user_assets/js/postCreateHandler.js', 'public/user_assets/js/postCreateHandler.min.js')
    .js('resources/user_assets/js/postShowHandler.js', 'public/user_assets/js/postShowHandler.min.js')
    .js('resources/user_assets/js/profileHandler.js', 'public/user_assets/js/profileHandler.min.js')
    .js('resources/user_assets/js/postMapHandler.js', 'public/user_assets/js/postMapHandler.min.js')
    .js('resources/user_assets/js/postCreate.js', 'public/user_assets/js/postCreate.min.js')
    .js('resources/user_assets/js/profileLeadsHandler.js', 'public/user_assets/js/profileLeadsHandler.min.js')
    .js('resources/user_assets/js/userIntegrations.js', 'public/user_assets/js/userIntegrations.min.js')
    .js('resources/js/admin-panel.js', 'public/admin/custom-js/admin-panel.js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/user_assets/css/core.scss', 'public/user_assets/css/core.css')
    .sass('resources/user_assets/css/dynamicAddress.scss', 'public/user_assets/css/dynamicAddress.css');
