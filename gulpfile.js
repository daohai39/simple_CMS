const elixir = require('laravel-elixir');
require('laravel-elixir-vue');

const plugins = require('./gulp-config/plugins');
const directories = require('./gulp-config/directories');
require('./gulp-config/elixir-extensions');


elixir(function(mix) {
      // Generate laroute.js
    mix.laroute()
       // Copy all bower plugins to public directory
       .bower(plugins.bower, directories.bower.src, directories.bower.output)
        // Compiling backend styles
        .styles([
          '../bower/AdminLTE/dist/css/AdminLTE.css',
          '../bower/AdminLTE/dist/css/skins/skin-blue.css',
          'backend/*.css'
        ],'public/assets/css/backend/app.css')
        // Compiling backend scripts
        .scripts([
          'laroute.js',
          'backend/*.js',
          '../bower/AdminLTE/dist/js/app.js',
        ], 'public/assets/js/backend/app.js')
        // Compiling frontend styles
        .styles([
          'frontend/files/css/*.css',
          'frontend/files/rs-plugin/css/*.css',
        ],'public/assets/css/frontend/app.css')
        // Compiling frontend scripts
        .scripts([
          'frontend/files/js/*.js',
          'frontend/files/rs-plugin/js/*.js',
        ], 'public/assets/js/frontend/app.js')
        .version([
            'assets/js/backend/app.js',
            'assets/css/backend/app.css',
            'assets/js/frontend/app.js',
            'assets/css/frontend/app.css',
        ])
        .webpack('vue/backend/form.js', 'public/assets/js/backend/form.js')
        // Versioning backend & frontend styles and scripts
        
        .browserSync({
            proxy: 'http://decoks.dev'
        })
        // .phpUnit()
        ;
});
