const mix = require('laravel-mix');

mix.js('src/js/app.js', './dist/js/')
    .sass('src/scss/app.scss', './dist/css/')
    .sourceMaps(true, 'source-map');
mix.options({
    processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
    
});
mix.disableNotifications()


