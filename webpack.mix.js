let mix = require('laravel-mix');

mix.js('assets/js/vinyl-graphics.js', 'public/js')
    .sass('assets/sass/vinyl-graphics.scss', 'public/css')
    .copyDirectory('assets/files', 'public/files');