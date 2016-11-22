(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://decoks.dev',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":"post.login","action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"post.logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"img\/{path}","name":"image","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.dashboard","action":"App\Http\Controllers\Backend\BackendController@dashboard"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider","name":"admin.slider.index","action":"App\Http\Controllers\Backend\SliderController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/create","name":"admin.slider.create","action":"App\Http\Controllers\Backend\SliderController@create"},{"host":null,"methods":["POST"],"uri":"admin\/slider","name":"admin.slider.store","action":"App\Http\Controllers\Backend\SliderController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/slider\/{slider}\/edit","name":"admin.slider.edit","action":"App\Http\Controllers\Backend\SliderController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/slider\/{slider}","name":"admin.slider.update","action":"App\Http\Controllers\Backend\SliderController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/slider\/{slider}","name":"admin.slider.destroy","action":"App\Http\Controllers\Backend\SliderController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/customer","name":"admin.customer.index","action":"App\Http\Controllers\Backend\CustomerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/customer\/create","name":"admin.customer.create","action":"App\Http\Controllers\Backend\CustomerController@create"},{"host":null,"methods":["POST"],"uri":"admin\/customer","name":"admin.customer.store","action":"App\Http\Controllers\Backend\CustomerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/customer\/{customer}\/edit","name":"admin.customer.edit","action":"App\Http\Controllers\Backend\CustomerController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/customer\/{customer}","name":"admin.customer.update","action":"App\Http\Controllers\Backend\CustomerController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/customer\/{customer}","name":"admin.customer.destroy","action":"App\Http\Controllers\Backend\CustomerController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post","name":"admin.post.index","action":"App\Http\Controllers\Backend\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post\/create","name":"admin.post.create","action":"App\Http\Controllers\Backend\PostController@create"},{"host":null,"methods":["POST"],"uri":"admin\/post","name":"admin.post.store","action":"App\Http\Controllers\Backend\PostController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post\/{post}\/edit","name":"admin.post.edit","action":"App\Http\Controllers\Backend\PostController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/post\/{post}","name":"admin.post.update","action":"App\Http\Controllers\Backend\PostController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/post\/{post}","name":"admin.post.destroy","action":"App\Http\Controllers\Backend\PostController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/project","name":"admin.project.index","action":"App\Http\Controllers\Backend\ProjectController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/project\/create","name":"admin.project.create","action":"App\Http\Controllers\Backend\ProjectController@create"},{"host":null,"methods":["POST"],"uri":"admin\/project","name":"admin.project.store","action":"App\Http\Controllers\Backend\ProjectController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/project\/{project}\/edit","name":"admin.project.edit","action":"App\Http\Controllers\Backend\ProjectController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/project\/{project}","name":"admin.project.update","action":"App\Http\Controllers\Backend\ProjectController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/project\/{project}","name":"admin.project.destroy","action":"App\Http\Controllers\Backend\ProjectController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product","name":"admin.product.index","action":"App\Http\Controllers\Backend\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/create","name":"admin.product.create","action":"App\Http\Controllers\Backend\ProductController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product","name":"admin.product.store","action":"App\Http\Controllers\Backend\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/{product}\/edit","name":"admin.product.edit","action":"App\Http\Controllers\Backend\ProductController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/product\/{product}","name":"admin.product.update","action":"App\Http\Controllers\Backend\ProductController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/{product}","name":"admin.product.destroy","action":"App\Http\Controllers\Backend\ProductController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer","name":"admin.designer.index","action":"App\Http\Controllers\Backend\DesignerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer\/create","name":"admin.designer.create","action":"App\Http\Controllers\Backend\DesignerController@create"},{"host":null,"methods":["POST"],"uri":"admin\/designer","name":"admin.designer.store","action":"App\Http\Controllers\Backend\DesignerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer\/{designer}\/edit","name":"admin.designer.edit","action":"App\Http\Controllers\Backend\DesignerController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/designer\/{designer}","name":"admin.designer.update","action":"App\Http\Controllers\Backend\DesignerController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/designer\/{designer}","name":"admin.designer.destroy","action":"App\Http\Controllers\Backend\DesignerController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category","name":"admin.category.index","action":"App\Http\Controllers\Backend\CategoryController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category\/create","name":"admin.category.create","action":"App\Http\Controllers\Backend\CategoryController@create"},{"host":null,"methods":["POST"],"uri":"admin\/category","name":"admin.category.store","action":"App\Http\Controllers\Backend\CategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category\/{category}\/edit","name":"admin.category.edit","action":"App\Http\Controllers\Backend\CategoryController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/category\/{category}","name":"admin.category.update","action":"App\Http\Controllers\Backend\CategoryController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/category\/{category}","name":"admin.category.destroy","action":"App\Http\Controllers\Backend\CategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stage\/create","name":"admin.stage.create","action":"App\Http\Controllers\Backend\StageController@create"},{"host":null,"methods":["POST"],"uri":"admin\/stage","name":"admin.stage.store","action":"App\Http\Controllers\Backend\StageController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stage\/{stage}\/edit","name":"admin.stage.edit","action":"App\Http\Controllers\Backend\StageController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/stage\/{stage}","name":"admin.stage.update","action":"App\Http\Controllers\Backend\StageController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/stage\/{stage}","name":"admin.stage.destroy","action":"App\Http\Controllers\Backend\StageController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tag","name":"admin.tag.index","action":"App\Http\Controllers\Backend\TagController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tag\/create","name":"admin.tag.create","action":"App\Http\Controllers\Backend\TagController@create"},{"host":null,"methods":["DELETE"],"uri":"admin\/tag\/{tag}","name":"admin.tag.destroy","action":"App\Http\Controllers\Backend\TagController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/setting","name":"admin.setting.index","action":"App\Http\Controllers\Backend\SettingController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/setting\/{setting}\/edit","name":"admin.setting.edit","action":"App\Http\Controllers\Backend\SettingController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/setting\/{setting}","name":"admin.setting.update","action":"App\Http\Controllers\Backend\SettingController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/media\/{id}","name":"admin.media.preview","action":"App\Http\Controllers\Backend\MediaController@preview"},{"host":null,"methods":["DELETE"],"uri":"admin\/media\/{id}","name":"admin.media.destroy","action":"App\Http\Controllers\Backend\MediaController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/media\/document","name":"admin.media.document.store","action":"App\Http\Controllers\Backend\MediaController@storeDocument"},{"host":null,"methods":["POST"],"uri":"admin\/media\/image","name":"admin.media.image.store","action":"App\Http\Controllers\Backend\MediaController@storeImage"},{"host":null,"methods":["POST"],"uri":"admin\/media\/image\/thumbnail","name":"admin.media.image.thumbnail","action":"App\Http\Controllers\Backend\MediaController@changeThumbnail"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"frontend.index","action":"App\Http\Controllers\Frontend\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"post","name":"frontend.post.index","action":"App\Http\Controllers\Frontend\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"product","name":"frontend.product.index","action":"App\Http\Controllers\Frontend\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"post\/{post_slug}","name":"frontend.post.show","action":"App\Http\Controllers\Frontend\PostController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"{slug}","name":"frontend.slug.show","action":"App\Http\Controllers\Frontend\SlugController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                return this.getCorrectUrl(uri + qs);
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if(!this.absolute)
                    return url;

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

