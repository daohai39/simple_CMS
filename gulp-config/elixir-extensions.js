const Elixir = require('laravel-elixir');
const path = require('path');
const gulp = require('gulp');
const shell  = require('gulp-shell');

const Task = Elixir.Task;


Elixir.ready(function() {
    Elixir.webpack.mergeConfig({
        module: {
            loaders: [
                { test: /\.css$/, loader: "style-loader!css-loader" },
                { test: /\.(eot|ttf|woff|png|jpg|gif|svg)$/, loader: "url-loader?limit=100000" },
                { test: /\.(eot|ttf|woff|png|jpg|gif|svg)$/, loader: "file-loader" }
            ]
        }
    });
});




Elixir.extend('bower', function(plugins, src, output) {
	const self = this;
	const tasks = plugins.map(function (plugin) {
	    self.mixins.copy(path.join(src, plugin.src), path.join(output, plugin.output))
	});
});

Elixir.extend('laroute', function (files) {
  files = files || './routes/*.php';

  new Task('laroute', function () {
    return (
      gulp.src('')
        .pipe(shell('php artisan laroute:generate'))
    );
  })
  .watch(files);
});
