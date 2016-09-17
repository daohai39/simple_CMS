var Elixir = require('laravel-elixir');
var path = require('path');
var gulp = require('gulp');


var Task = Elixir.Task;

Elixir.extend('bower', function(plugins, src, output) {
	var self = this;
	var tasks = plugins.map(function (plugin) {
	    self.mixins.copy(path.join(src, plugin.src), path.join(output, plugin.output))
	});
});
