const mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/js');

mix.postCss('resources/css/app.css', 'public/css', [require('tailwindcss')()]);

mix.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
});

mix.webpackConfig({
    output: {
        publicPath: '/',
        chunkFilename: 'js/[name].js',
    },
});

mix.purgeCss();
