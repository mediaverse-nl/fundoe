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

mix
    //site js
    .js('resources/assets/js/app.js', 'public/js')
    //panel js
    .js('resources/assets/js/auth/app.js', 'public/js/auth')
    //admin js
    .js('resources/assets/js/admin/app.js', 'public/js/admin')
    //site css
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/site/register.scss', 'public/css/site')
    .sass('resources/assets/sass/site/reset.scss', 'public/css/site')
    .sass('resources/assets/sass/site/login.scss', 'public/css/site')
    .sass('resources/assets/sass/site/activity.scss', 'public/css/site')
    .sass('resources/assets/sass/site/category.scss', 'public/css/site')
    //panel css
    .sass('resources/assets/sass/auth/app.scss', 'public/css/auth')
    //admin css
    .sass('resources/assets/sass/admin/app.scss', 'public/css/admin');