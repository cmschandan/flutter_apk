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
   .js('resources/assets/js/sp_globals.js', 'public/js')
	.js('resources/assets/js/blade-components/add_doctor.js', 'public/js/blade-components')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/custom-scss/sp_globals.scss', 'public/css/sp_globals.css')
   .copy('resources/assets/images',
        'public/images')
   .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts');
