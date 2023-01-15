let mix = require('laravel-mix');

let tailwindcss = require('tailwindcss');

mix.postCss('resources/css/tailwind.css', 'public/css', [
  tailwindcss('./tailwind.js'),
]).postCss('resources/css/soft-ui-dashboard-tailwind.css', 'public/css');
