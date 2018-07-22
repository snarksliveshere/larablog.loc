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

mix.styles([
    'resources/assets/admin/bootstrap/css/bootstrap.min.css',
    'resources/assets/admin/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/assets/admin/ionicons/2.0.1/css/ionicons.min.css',
    'resources/assets/admin/plugins/iCheck/minimal/_all.css',
    'resources/assets/admin/plugins/datepicker/datepicker3.css',
    'resources/assets/admin/plugins/select2/select2.min.css',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.css',
    'resources/assets/admin/dist/css/AdminLTE.min.css',
    'resources/assets/admin/dist/css/skins/_all-skins.min.css',
    'resources/assets/admin/dist/css/skins/custom.css',
], 'public/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/assets/admin/bootstrap/js/bootstrap.min.js',
    'resources/assets/admin/plugins/select2/select2.full.min.js',
    'resources/assets/admin/plugins/datepicker/bootstrap-datepicker.js',
    'resources/assets/admin/plugins/datatables/jquery.dataTables.min.js',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.min.js',
    'resources/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/assets/admin/plugins/fastclick/fastclick.js',
    'resources/assets/admin/plugins/iCheck/icheck.min.js',
    'resources/assets/admin/dist/js/app.min.js',
    'resources/assets/admin/dist/js/demo.js',
    'resources/assets/admin/dist/js/scripts.js'
], 'public/js/admin.js');

mix.copy('resources/assets/admin/bootstrap/fonts', 'public/fonts');
mix.copy('resources/assets/admin/dist/fonts', 'public/fonts');
mix.copy('resources/assets/admin/plugins/iCheck/minimal/blue.png', 'public/css');

mix.copy('resources/assets/front/fonts', 'public/fonts');
mix.copy('resources/assets/front/images', 'public/images');
mix.copy('resources/assets/front/js/main.js', 'public/js/main.js');
mix.styles([
    'resources/assets/front/vendor/bootstrap/css/bootstrap.min.css',
    'resources/assets/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
    'resources/assets/front/vendor/animate/animate.css',
    'resources/assets/front/vendor/css-hamburgers/hamburgers.min.css',
    'resources/assets/front/vendor/animsition/css/animsition.min.css',
    'resources/assets/front/vendor/slick/slick.css',
    'resources/assets/front/vendor/MagnificPopup/magnific-popup.css',
    'resources/assets/front/js/fancybox/jquery.fancybox.min.css',
    'resources/assets/front/css/util.css',
    'resources/assets/front/css/main.css'
],'public/css/front.css');

mix.scripts([
    'resources/assets/front/vendor/jquery/jquery-3.2.1.min.js',
    'resources/assets/front/vendor/animsition/js/animsition.min.js',
    'resources/assets/front/vendor/bootstrap/js/popper.js',
    'resources/assets/front/vendor/bootstrap/js/bootstrap.min.js',
    'resources/assets/front/vendor/slick/slick.min.js',
    'resources/assets/front/js/fancybox/jquery.fancybox.min.js',
    'resources/assets/front/js/slick-custom.js',
    'resources/assets/front/vendor/MagnificPopup/jquery.magnific-popup.min.js',
    'resources/assets/front/vendor/parallax100/parallax100.js'
], 'public/js/front.js');


