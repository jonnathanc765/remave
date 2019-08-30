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

// mix.webpackConfig({
//     target: 'node',
// });


mix //.js('resources/js/app.js', 'public/js/dashboard')
    // .sass('resources/sass/app.scss', 'public/css');
    .js('resources/js/main.js', 'public/js')
    
    // Dashboard JS
    .js('resources/js/dashboard/dashboard-influencer.js', 'public/js/dashboard/dashboard-influencer.js')
    .js('resources/js/dashboard/dashboard-sales.js', 'public/js/dashboard/dashboard-sales.js')
    .js('resources/js/dashboard/dashboard-finance.js', 'public/js/dashboard/dashboard-finance.js')
    .js('resources/js/dashboard/jvectormap.custom.js', 'public/js/dashboard/jvectormap.custom.js')
    .js('resources/js/dashboard/google_maps.js', 'public/js/dashboard/google_maps.js')
    .js('resources/js/dashboard/edit-post.js', 'public/js/dashboard/edit-post.js')
    .js('resources/js/dashboard/main.js', 'public/js/dashboard/main.js')
    .js('resources/js/dashboard/DataTables.js', 'public/js/dashboard/DataTables.js')

    .sass('resources/sass/dashboard.scss', 'public/css/dashboard')
    .sass('resources/sass/style.scss', 'public/css')

    .js('resources/js/vue/components/bundle.js', 'public/js/vue')
    
    .js('resources/js/vue/product/bundle.js', 'public/js/vue/edit')
    .js('resources/js/vue/cart/bundle.js', 'public/js/vue/cart')
    
    
    ;
