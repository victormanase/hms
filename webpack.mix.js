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
//testing
mix.scripts(['resources/assets/gentelella/vendors/jquery/dist/jquery.min.js',
    'resources/assets/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/gentelella/vendors/fastclick/lib/fastclick.js',
    'resources/assets/gentelella/vendors/nprogress/nprogress.js',
    'resources/assets/gentelella/build/js/custom.min.js'], 'public/js/all.js')
    .sass('resources/assets/gentelella/vendors/font-awesome/scss/font-awesome.scss', 'public/css/all.css')
    .styles(['resources/assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css',
        'resources/assets/gentelella/vendors/nprogress/nprogress.css',
        'resources/assets/gentelella/build/css/custom.min.css'], 'public/css/all.css');
