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
          'frontend/files/css/animate.css',
        ],'public/assets/css/frontend/animate.css')
        .styles([
          'frontend/files/css/custom.css',
        ],'public/assets/css/frontend/custom.css')
        .styles([
          'frontend/files/css/simple-line-icons.css',
        ],'public/assets/css/frontend/simple-line-icons.css')
        .styles([
          'frontend/files/css/style.css',
        ],'public/assets/css/frontend/style.css')
        .styles([
          'frontend/files/rs-plugin/css/settings.css',
        ],'public/assets/css/frontend/settings.css')

        // Compiling frontend scripts
        .scripts([
          'frontend/files/js/add-on.js',
        ], 'public/assets/js/frontend/add-on.js')
        .scripts([
          'frontend/files/js/custom.js',
        ], 'public/assets/js/frontend/custom.js')
        .scripts([
          'frontend/files/js/plugins.js',
        ], 'public/assets/js/frontend/plugins.js')
        .scripts([
          'frontend/files/rs-plugin/js/jquery.themepunch.tools.min.js',
        ], 'public/assets/js/frontend/jquery.themepunch.tools.min.js')
        .scripts([
          'frontend/files/rs-plugin/js/jquery.themepunch.revolution.min.js',
        ], 'public/assets/js/frontend/jquery.themepunch.revolution.min.js')



        .version([
            'assets/js/backend/app.js',
            'assets/css/backend/app.css',
        ])
        .webpack('vue/backend/form.js', 'public/assets/js/backend/form.js')
        // Versioning backend & frontend styles and scripts

        .browserSync({
            proxy: 'http://decoks.dev'
        })
        // .phpUnit()
        ;
});
