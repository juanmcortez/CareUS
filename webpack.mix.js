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

mix.js('resources/js/careus.js', 'public/js')
    .vue()
    .extract(['axios', 'vue'])
    .sass('resources/sass/careus.scss', 'public/css')
    .sass('resources/sass/careus_print.scss', 'public/css')
    .options({
        fileLoaderDirs: {
            images: 'public/images',
            fonts: 'public/fonts'
        },
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
        ]
    })
    .version();
