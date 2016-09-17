var elixir = require('laravel-elixir');
var plugins = require('./npm/plugins');

require('./npm/elixir-extensions')

var directories = {
    bower: {
        in:'resources/assets/bower',
        out:'public/vendor'
    }
}





elixir(function(mix) {
    mix .bower(plugins.bower, directories.bower.in, directories.bower.out)
        // Compiling backend styles
        .sass([
            '../bower/gentelella/src/scss/*.scss',
            'backend/*.scss',
            ],'public/css/backend.css')
        // Compiling frontend styles
        .sass(
            'frontend/*.scss',
            'public/css/frontend.css'
        )
        // Compiling backend scripts
        .scripts([
            'laroute.js',
            '../bower/gentelella/src/js/*.js',
            'backend/*.js',
        ], 'public/js/backend.js')
        // Compiling frontend scripts
        .scripts([
            'laroute.js',
            'frontend/*.js',
        ], 'public/js/frontend.js')

        // Versioning backend & frontend styles and scripts
        .version([
            'js/backend.js',
            'js/frontend.js',
            'css/backend.css',
            'css/frontend.css',
        ])
        .browserSync({
            proxy: 'http://decoks.dev'
        })
        // .phpUnit()
        ;
});
