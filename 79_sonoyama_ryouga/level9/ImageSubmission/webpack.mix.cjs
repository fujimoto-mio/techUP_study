const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')  // app.jsをコンパイルしてpublic/js/app.jsに出力
   .sass('resources/sass/app.scss', 'public/css'); // app.cssをコンパイルしてpublic/css/app.cssに出力
