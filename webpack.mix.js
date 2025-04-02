const mix = require('laravel-mix');

mix
    .css('resources/css/app.css', 'public/css')  // Compilar o CSS para public/css
    .js('resources/js/app.js', 'public/js');    // Compilar JS (se necessário)
