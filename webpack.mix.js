const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const autoprefixer = require("autoprefixer");

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

// bundle js
mix.js("resources/js/app.js", "public/js");

// bundle sass/css
mix.sass("resources/sass/index.scss", "public/css/app.css")
    .options({
        postCss: [autoprefixer, tailwindcss("./tailwind.config.js")],
    })
    .sourceMaps()
    .version();
