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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/algo.js', 'public/js')
    .copy('node_modules/chart.js/dist/Chart.min.js', 'public/js')
    .js('resources/js/ckeditorProduct.js', 'public/js')
    .js('resources/js/detalleProducto.js', 'public/js')
    .js('resources/js/envio.js', 'public/js')
    .js('resources/js/filtrarProducto.js', 'public/js')
    .js('resources/js/glider.min.js', 'public/js')
    .js('resources/js/gliderApp.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/sliderDetalle.js', 'public/js')
    .js('resources/js/sliderGlider.js', 'public/js')
    .sass('resources/sass/admin/cupones.scss', 'public/css')
    .sass('resources/sass/admin/envios.scss', 'public/css')
    .sass('resources/sass/admin/homeAdmin.scss', 'public/css')
    .sass('resources/sass/admin/masvendidos.scss', 'public/css')
    .sass('resources/sass/admin/menuAdmin.scss', 'public/css')
    .sass('resources/sass/admin/noenviados.scss', 'public/css')
    .sass('resources/sass/admin/normFont.scss', 'public/css')
    .sass('resources/sass/admin/pedidos.scss', 'public/css')
    .sass('resources/sass/admin/slider.scss', 'public/css')
    .sass('resources/sass/about.scss', 'public/css')
    .sass('resources/sass/app1.scss', 'public/css')
    .sass('resources/sass/detalle.scss', 'public/css')
    .sass('resources/sass/errors.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/productos.scss', 'public/css')
    .postCss('resources/css/glider.min.css', 'public/css', [
        //
    ])
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'))
    .sourceMaps();

mix.browserSync('http://flamma.com/');

if (mix.inProduction()) {
    mix.version();
    // mix.minify();
}
