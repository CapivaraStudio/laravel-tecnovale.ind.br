const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .sass('resources/scss/admin/admin.scss', 'public/css/admin/')
  .sass('resources/scss/website/website.scss', 'public/css/website/')
  .scripts('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
  .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/bootstrap.bundle.js')
  .scripts('node_modules/admin-lte/dist/js/adminlte.js', 'public/js/adminLTE.js')
  .scripts('node_modules/@fortawesome/fontawesome-free/js/fontawesome.js', 'public/js/fontawesome.js')
  .scripts('node_modules/inputmask/dist/jquery.inputmask.js', 'public/js/inputmask.js')
  .scripts('node_modules/bs-custom-file-input/dist/bs-custom-file-input.js', 'public/js/bs-custom-file-input.js')
  .scripts('node_modules/lightbox2/dist/js/lightbox.js', 'public/js/lightbox2.js')
  .scripts('resources/js/admin.js', 'public/js/admin.js')
  .scripts('resources/js/ckeditor/ckeditor.js', 'public/js/ckeditor/ckeditor.js')
  .scripts('resources/js/website.js', 'public/js/website.js')
  .version();
