(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://decoks.dev',
<<<<<<< HEAD
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":"post.login","action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"post.logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"img\/{path}","name":"image","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.dashboard","action":"App\Http\Controllers\Backend\BackendController@dashboard"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/customer","name":"admin.customer.index","action":"App\Http\Controllers\Backend\CustomerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/customer\/create","name":"admin.customer.create","action":"App\Http\Controllers\Backend\CustomerController@create"},{"host":null,"methods":["POST"],"uri":"admin\/customer","name":"admin.customer.store","action":"App\Http\Controllers\Backend\CustomerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/customer\/{customer}\/edit","name":"admin.customer.edit","action":"App\Http\Controllers\Backend\CustomerController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/customer\/{customer}","name":"admin.customer.update","action":"App\Http\Controllers\Backend\CustomerController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/customer\/{customer}","name":"admin.customer.destroy","action":"App\Http\Controllers\Backend\CustomerController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post","name":"admin.post.index","action":"App\Http\Controllers\Backend\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post\/create","name":"admin.post.create","action":"App\Http\Controllers\Backend\PostController@create"},{"host":null,"methods":["POST"],"uri":"admin\/post","name":"admin.post.store","action":"App\Http\Controllers\Backend\PostController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post\/{post}\/edit","name":"admin.post.edit","action":"App\Http\Controllers\Backend\PostController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/post\/{post}","name":"admin.post.update","action":"App\Http\Controllers\Backend\PostController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/post\/{post}","name":"admin.post.destroy","action":"App\Http\Controllers\Backend\PostController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/project","name":"admin.project.index","action":"App\Http\Controllers\Backend\ProjectController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/project\/create","name":"admin.project.create","action":"App\Http\Controllers\Backend\ProjectController@create"},{"host":null,"methods":["POST"],"uri":"admin\/project","name":"admin.project.store","action":"App\Http\Controllers\Backend\ProjectController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/project\/{project}\/edit","name":"admin.project.edit","action":"App\Http\Controllers\Backend\ProjectController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/project\/{project}","name":"admin.project.update","action":"App\Http\Controllers\Backend\ProjectController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/project\/{project}","name":"admin.project.destroy","action":"App\Http\Controllers\Backend\ProjectController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product","name":"admin.product.index","action":"App\Http\Controllers\Backend\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/create","name":"admin.product.create","action":"App\Http\Controllers\Backend\ProductController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product","name":"admin.product.store","action":"App\Http\Controllers\Backend\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/{product}\/edit","name":"admin.product.edit","action":"App\Http\Controllers\Backend\ProductController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/product\/{product}","name":"admin.product.update","action":"App\Http\Controllers\Backend\ProductController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/{product}","name":"admin.product.destroy","action":"App\Http\Controllers\Backend\ProductController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer","name":"admin.designer.index","action":"App\Http\Controllers\Backend\DesignerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer\/create","name":"admin.designer.create","action":"App\Http\Controllers\Backend\DesignerController@create"},{"host":null,"methods":["POST"],"uri":"admin\/designer","name":"admin.designer.store","action":"App\Http\Controllers\Backend\DesignerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer\/{designer}\/edit","name":"admin.designer.edit","action":"App\Http\Controllers\Backend\DesignerController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/designer\/{designer}","name":"admin.designer.update","action":"App\Http\Controllers\Backend\DesignerController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/designer\/{designer}","name":"admin.designer.destroy","action":"App\Http\Controllers\Backend\DesignerController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category","name":"admin.category.index","action":"App\Http\Controllers\Backend\CategoryController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category\/create","name":"admin.category.create","action":"App\Http\Controllers\Backend\CategoryController@create"},{"host":null,"methods":["POST"],"uri":"admin\/category","name":"admin.category.store","action":"App\Http\Controllers\Backend\CategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category\/{category}\/edit","name":"admin.category.edit","action":"App\Http\Controllers\Backend\CategoryController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/category\/{category}","name":"admin.category.update","action":"App\Http\Controllers\Backend\CategoryController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/category\/{category}","name":"admin.category.destroy","action":"App\Http\Controllers\Backend\CategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stage\/create","name":"admin.stage.create","action":"App\Http\Controllers\Backend\StageController@create"},{"host":null,"methods":["POST"],"uri":"admin\/stage","name":"admin.stage.store","action":"App\Http\Controllers\Backend\StageController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/stage\/{stage}\/edit","name":"admin.stage.edit","action":"App\Http\Controllers\Backend\StageController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/stage\/{stage}","name":"admin.stage.update","action":"App\Http\Controllers\Backend\StageController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/stage\/{stage}","name":"admin.stage.destroy","action":"App\Http\Controllers\Backend\StageController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tag","name":"admin.tag.index","action":"App\Http\Controllers\Backend\TagController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tag\/create","name":"admin.tag.create","action":"App\Http\Controllers\Backend\TagController@create"},{"host":null,"methods":["DELETE"],"uri":"admin\/tag\/{tag}","name":"admin.tag.destroy","action":"App\Http\Controllers\Backend\TagController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/setting","name":"admin.setting.index","action":"App\Http\Controllers\Backend\SettingController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/setting\/{setting}\/edit","name":"admin.setting.edit","action":"App\Http\Controllers\Backend\SettingController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/setting\/{setting}","name":"admin.setting.update","action":"App\Http\Controllers\Backend\SettingController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/media\/{id}","name":"admin.media.preview","action":"App\Http\Controllers\Backend\MediaController@preview"},{"host":null,"methods":["DELETE"],"uri":"admin\/media\/{id}","name":"admin.media.destroy","action":"App\Http\Controllers\Backend\MediaController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/media\/document","name":"admin.media.document.store","action":"App\Http\Controllers\Backend\MediaController@storeDocument"},{"host":null,"methods":["POST"],"uri":"admin\/media\/image","name":"admin.media.image.store","action":"App\Http\Controllers\Backend\MediaController@storeImage"},{"host":null,"methods":["POST"],"uri":"admin\/media\/image\/thumbnail","name":"admin.media.image.thumbnail","action":"App\Http\Controllers\Backend\MediaController@changeThumbnail"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"frontend.index","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"post","name":"frontend.post.index","action":"App\Http\Controllers\Frontend\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"product","name":"frontend.product.index","action":"App\Http\Controllers\Frontend\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"post\/{post_slug}","name":"frontend.post.show","action":"App\Http\Controllers\Frontend\PostController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"{slug}","name":"frontend.slug.show","action":"App\Http\Controllers\Frontend\SlugController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"}],
=======
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":"post.login","action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"post.logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"img\/{path}","name":"image","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.dashboard","action":"App\Http\Controllers\Backend\BackendController@dashboard"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post","name":"admin.post.index","action":"App\Http\Controllers\Backend\PostController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post\/create","name":"admin.post.create","action":"App\Http\Controllers\Backend\PostController@create"},{"host":null,"methods":["POST"],"uri":"admin\/post","name":"admin.post.store","action":"App\Http\Controllers\Backend\PostController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/post\/{post}\/edit","name":"admin.post.edit","action":"App\Http\Controllers\Backend\PostController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/post\/{post}","name":"admin.post.update","action":"App\Http\Controllers\Backend\PostController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/post\/{post}","name":"admin.post.destroy","action":"App\Http\Controllers\Backend\PostController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product","name":"admin.product.index","action":"App\Http\Controllers\Backend\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/create","name":"admin.product.create","action":"App\Http\Controllers\Backend\ProductController@create"},{"host":null,"methods":["POST"],"uri":"admin\/product","name":"admin.product.store","action":"App\Http\Controllers\Backend\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/product\/{product}\/edit","name":"admin.product.edit","action":"App\Http\Controllers\Backend\ProductController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/product\/{product}","name":"admin.product.update","action":"App\Http\Controllers\Backend\ProductController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/product\/{product}","name":"admin.product.destroy","action":"App\Http\Controllers\Backend\ProductController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer","name":"admin.designer.index","action":"App\Http\Controllers\Backend\DesignerController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer\/create","name":"admin.designer.create","action":"App\Http\Controllers\Backend\DesignerController@create"},{"host":null,"methods":["POST"],"uri":"admin\/designer","name":"admin.designer.store","action":"App\Http\Controllers\Backend\DesignerController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/designer\/{designer}\/edit","name":"admin.designer.edit","action":"App\Http\Controllers\Backend\DesignerController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/designer\/{designer}","name":"admin.designer.update","action":"App\Http\Controllers\Backend\DesignerController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/designer\/{designer}","name":"admin.designer.destroy","action":"App\Http\Controllers\Backend\DesignerController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category","name":"admin.category.index","action":"App\Http\Controllers\Backend\CategoryController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category\/create","name":"admin.category.create","action":"App\Http\Controllers\Backend\CategoryController@create"},{"host":null,"methods":["POST"],"uri":"admin\/category","name":"admin.category.store","action":"App\Http\Controllers\Backend\CategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/category\/{category}\/edit","name":"admin.category.edit","action":"App\Http\Controllers\Backend\CategoryController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/category\/{category}","name":"admin.category.update","action":"App\Http\Controllers\Backend\CategoryController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/category\/{category}","name":"admin.category.destroy","action":"App\Http\Controllers\Backend\CategoryController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tag","name":"admin.tag.index","action":"App\Http\Controllers\Backend\TagController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/tag\/create","name":"admin.tag.create","action":"App\Http\Controllers\Backend\TagController@create"},{"host":null,"methods":["DELETE"],"uri":"admin\/tag\/{tag}","name":"admin.tag.destroy","action":"App\Http\Controllers\Backend\TagController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/setting","name":"admin.setting.index","action":"App\Http\Controllers\Backend\SettingController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/setting\/{setting}\/edit","name":"admin.setting.edit","action":"App\Http\Controllers\Backend\SettingController@edit"},{"host":null,"methods":["PUT","PATCH"],"uri":"admin\/setting\/{setting}","name":"admin.setting.update","action":"App\Http\Controllers\Backend\SettingController@update"},{"host":null,"methods":["DELETE"],"uri":"admin\/media\/{id}","name":"admin.media.destroy","action":"App\Http\Controllers\Backend\MediaController@destroy"},{"host":null,"methods":["POST"],"uri":"admin\/media\/image","name":"admin.media.image.store","action":"App\Http\Controllers\Backend\MediaController@storeImage"},{"host":null,"methods":["POST"],"uri":"admin\/media\/image\/thumbnail","name":"admin.media.image.thumbnail","action":"App\Http\Controllers\Backend\MediaController@changeThumbnail"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"}],
>>>>>>> 56590c9d242e300e030ae5c1d881e335f37724a3
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




$('div.alert').not('.alert-danger ').not('.alert-important').delay(3000).fadeOut(350);

var DataTables = function(selector, options) {
  var language = {
  // "decimal" :        ",",
  // "emptyTable" :     "Không có dữ liệu trong bảng",
  // "info" :           "Thể hiện _START_ đến _END_ trên _TOTAL_ dữ liệu",
  // "infoEmpty" :      "Thể hiện 0 đến 0 của 0 dữ liệu",
  // "infoFiltered" :   "(Lọc từ _MAX_ tổng số dữ liệu)",
  // "thousands" :      ".",
  // "lengthMenu" :     "Thể hiện _MENU_ dữ liệu",
  // "loadingRecords" : "Đang tải...",
  // "processing" :     "Đang tải...",
  // "search" :         "Tìm kiếm:",
  // "zeroRecords":    "Không có dự liệu nào được phù hợp",
  // "paginate": {
  //     "first":      "Đầu tiên",
  //     "last":       "Cuối cùng",
  //     "next":       "Sau",
  //     "previous":   "Trước"
  // },
};

  var options = $.extend(true, {
    processing: true,
    serverSide: true,
    ajax: null,
    language: language,
  }, options);

  return $(selector).DataTable(options);
}



var FormValidation = function() {
  FormValidation.prototype.validate = function(form) {
    $.listen('parsley:field:validate', function() {
      validateFront();
    });
    $(form + ' .btn').on('click', function() {
      $(form).parsley().validate();
      validateFront();
    });
    var validateFront = function() {
      return;
      // if (true === $(form).parsley().isValid()) {
      //   $('.bs-callout-info').removeClass('hidden');
      //   $('.bs-callout-warning').addClass('hidden');
      // } else {
      //   $('.bs-callout-info').addClass('hidden');
      //   $('.bs-callout-warning').removeClass('hidden');
      // }
    };
  }
};

(function() {

  var laravel = {
    initialize: function() {
      this.registerEvents();
    },

    registerEvents: function() {
      $(document).on('click', 'a[data-method]', this.handleMethod);
    },

    handleMethod: function(e) {
      var link = $(this);
      var httpMethod = link.data('method').toUpperCase();
      var form;

      // If the data-method attribute is not PUT or DELETE,
      // then we don't know what to do. Just ignore.
      if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
        return;
      }

      // Allow user to optionally provide data-confirm="Are you sure?"
      if ( link.data('confirm') ) {
        if ( ! laravel.verifyConfirm(link) ) {
          return false;
        }
      }

      form = laravel.createForm(link);
      form.submit();

      e.preventDefault();
    },

    verifyConfirm: function(link) {
      return confirm(link.data('confirm'));
    },

    createForm: function(link) {
      var form =
      $('<form>', {
        'method': 'POST',
        'action': link.attr('href')
      });

      var token =
      $('<input>', {
        'type': 'hidden',
        'name': '_token',
          'value': $('meta[name="csrf-token"]').attr('content')
        });

      var hiddenInput =
      $('<input>', {
        'name': '_method',
        'type': 'hidden',
        'value': link.data('method')
      });

      return form.append(token, hiddenInput)
                 .appendTo('body');
    }
  };

  laravel.initialize();

})();

var Select2 = function(selector, options) {
	var options = $.extend(true, {
      tags: false,
      language: "vi",
      escapeMarkup: function (markup) { return markup; },
      templateResult: function formatResult (obj) {
        if (obj.loading) return obj.text;
        return '<div>'+(obj.name || obj.text)+'</div>';
      },
      templateSelection: function formatSelection (obj) {
        return obj.name || obj.text;
      },
      ajax: {
        url: null,
        dataType: 'json',
        delay: 250,
        cache: true,
        method: 'GET',
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            }
        },
        success: function(response) {
            // console.log(response);
        },
        processResults: function (data, params) {
            params.page = data.page || 1;
            return {
                results: data.data,
                pagination: {
                    more: data.to < data.total
                }
            };
        }
      }
    }, options);

    $(selector).select2(options);
}

/*! AdminLTE app.js
 * ================
 * Main JS application file for AdminLTE v2. This file
 * should be included in all pages. It controls some layout
 * options and implements exclusive AdminLTE plugins.
 *
 * @Author  Almsaeed Studio
 * @Support <http://www.almsaeedstudio.com>
 * @Email   <abdullah@almsaeedstudio.com>
 * @version 2.3.6
 * @license MIT <http://opensource.org/licenses/MIT>
 */

//Make sure jQuery has been loaded before app.js
if (typeof jQuery === "undefined") {
  throw new Error("AdminLTE requires jQuery");
}

/* AdminLTE
 *
 * @type Object
 * @description $.AdminLTE is the main object for the template's app.
 *              It's used for implementing functions and options related
 *              to the template. Keeping everything wrapped in an object
 *              prevents conflict with other plugins and is a better
 *              way to organize our code.
 */
$.AdminLTE = {};

/* --------------------
 * - AdminLTE Options -
 * --------------------
 * Modify these options to suit your implementation
 */
$.AdminLTE.options = {
  //Add slimscroll to navbar menus
  //This requires you to load the slimscroll plugin
  //in every page before app.js
  navbarMenuSlimscroll: true,
  navbarMenuSlimscrollWidth: "3px", //The width of the scroll bar
  navbarMenuHeight: "200px", //The height of the inner menu
  //General animation speed for JS animated elements such as box collapse/expand and
  //sidebar treeview slide up/down. This options accepts an integer as milliseconds,
  //'fast', 'normal', or 'slow'
  animationSpeed: 500,
  //Sidebar push menu toggle button selector
  sidebarToggleSelector: "[data-toggle='offcanvas']",
  //Activate sidebar push menu
  sidebarPushMenu: true,
  //Activate sidebar slimscroll if the fixed layout is set (requires SlimScroll Plugin)
  sidebarSlimScroll: true,
  //Enable sidebar expand on hover effect for sidebar mini
  //This option is forced to true if both the fixed layout and sidebar mini
  //are used together
  sidebarExpandOnHover: false,
  //BoxRefresh Plugin
  enableBoxRefresh: true,
  //Bootstrap.js tooltip
  enableBSToppltip: true,
  BSTooltipSelector: "[data-toggle='tooltip']",
  //Enable Fast Click. Fastclick.js creates a more
  //native touch experience with touch devices. If you
  //choose to enable the plugin, make sure you load the script
  //before AdminLTE's app.js
  enableFastclick: false,
  //Control Sidebar Options
  enableControlSidebar: true,
  controlSidebarOptions: {
    //Which button should trigger the open/close event
    toggleBtnSelector: "[data-toggle='control-sidebar']",
    //The sidebar selector
    selector: ".control-sidebar",
    //Enable slide over content
    slide: true
  },
  //Box Widget Plugin. Enable this plugin
  //to allow boxes to be collapsed and/or removed
  enableBoxWidget: true,
  //Box Widget plugin options
  boxWidgetOptions: {
    boxWidgetIcons: {
      //Collapse icon
      collapse: 'fa-minus',
      //Open icon
      open: 'fa-plus',
      //Remove icon
      remove: 'fa-times'
    },
    boxWidgetSelectors: {
      //Remove button selector
      remove: '[data-widget="remove"]',
      //Collapse button selector
      collapse: '[data-widget="collapse"]'
    }
  },
  //Direct Chat plugin options
  directChat: {
    //Enable direct chat by default
    enable: true,
    //The button to open and close the chat contacts pane
    contactToggleSelector: '[data-widget="chat-pane-toggle"]'
  },
  //Define the set of colors to use globally around the website
  colors: {
    lightBlue: "#3c8dbc",
    red: "#f56954",
    green: "#00a65a",
    aqua: "#00c0ef",
    yellow: "#f39c12",
    blue: "#0073b7",
    navy: "#001F3F",
    teal: "#39CCCC",
    olive: "#3D9970",
    lime: "#01FF70",
    orange: "#FF851B",
    fuchsia: "#F012BE",
    purple: "#8E24AA",
    maroon: "#D81B60",
    black: "#222222",
    gray: "#d2d6de"
  },
  //The standard screen sizes that bootstrap uses.
  //If you change these in the variables.less file, change
  //them here too.
  screenSizes: {
    xs: 480,
    sm: 768,
    md: 992,
    lg: 1200
  }
};

/* ------------------
 * - Implementation -
 * ------------------
 * The next block of code implements AdminLTE's
 * functions and plugins as specified by the
 * options above.
 */
$(function () {
  "use strict";

  //Fix for IE page transitions
  $("body").removeClass("hold-transition");

  //Extend options if external options exist
  if (typeof AdminLTEOptions !== "undefined") {
    $.extend(true,
      $.AdminLTE.options,
      AdminLTEOptions);
  }

  //Easy access to options
  var o = $.AdminLTE.options;

  //Set up the object
  _init();

  //Activate the layout maker
  $.AdminLTE.layout.activate();

  //Enable sidebar tree view controls
  $.AdminLTE.tree('.sidebar');

  //Enable control sidebar
  if (o.enableControlSidebar) {
    $.AdminLTE.controlSidebar.activate();
  }

  //Add slimscroll to navbar dropdown
  if (o.navbarMenuSlimscroll && typeof $.fn.slimscroll != 'undefined') {
    $(".navbar .menu").slimscroll({
      height: o.navbarMenuHeight,
      alwaysVisible: false,
      size: o.navbarMenuSlimscrollWidth
    }).css("width", "100%");
  }

  //Activate sidebar push menu
  if (o.sidebarPushMenu) {
    $.AdminLTE.pushMenu.activate(o.sidebarToggleSelector);
  }

  //Activate Bootstrap tooltip
  if (o.enableBSToppltip) {
    $('body').tooltip({
      selector: o.BSTooltipSelector
    });
  }

  //Activate box widget
  if (o.enableBoxWidget) {
    $.AdminLTE.boxWidget.activate();
  }

  //Activate fast click
  if (o.enableFastclick && typeof FastClick != 'undefined') {
    FastClick.attach(document.body);
  }

  //Activate direct chat widget
  if (o.directChat.enable) {
    $(document).on('click', o.directChat.contactToggleSelector, function () {
      var box = $(this).parents('.direct-chat').first();
      box.toggleClass('direct-chat-contacts-open');
    });
  }

  /*
   * INITIALIZE BUTTON TOGGLE
   * ------------------------
   */
  $('.btn-group[data-toggle="btn-toggle"]').each(function () {
    var group = $(this);
    $(this).find(".btn").on('click', function (e) {
      group.find(".btn.active").removeClass("active");
      $(this).addClass("active");
      e.preventDefault();
    });

  });
});

/* ----------------------------------
 * - Initialize the AdminLTE Object -
 * ----------------------------------
 * All AdminLTE functions are implemented below.
 */
function _init() {
  'use strict';
  /* Layout
   * ======
   * Fixes the layout height in case min-height fails.
   *
   * @type Object
   * @usage $.AdminLTE.layout.activate()
   *        $.AdminLTE.layout.fix()
   *        $.AdminLTE.layout.fixSidebar()
   */
  $.AdminLTE.layout = {
    activate: function () {
      var _this = this;
      _this.fix();
      _this.fixSidebar();
      $(window, ".wrapper").resize(function () {
        _this.fix();
        _this.fixSidebar();
      });
    },
    fix: function () {
      //Get window height and the wrapper height
      var neg = $('.main-header').outerHeight() + $('.main-footer').outerHeight();
      var window_height = $(window).height();
      var sidebar_height = $(".sidebar").height();
      //Set the min-height of the content and sidebar based on the
      //the height of the document.
      if ($("body").hasClass("fixed")) {
        $(".content-wrapper, .right-side").css('min-height', window_height - $('.main-footer').outerHeight());
      } else {
        var postSetWidth;
        if (window_height >= sidebar_height) {
          $(".content-wrapper, .right-side").css('min-height', window_height - neg);
          postSetWidth = window_height - neg;
        } else {
          $(".content-wrapper, .right-side").css('min-height', sidebar_height);
          postSetWidth = sidebar_height;
        }

        //Fix for the control sidebar height
        var controlSidebar = $($.AdminLTE.options.controlSidebarOptions.selector);
        if (typeof controlSidebar !== "undefined") {
          if (controlSidebar.height() > postSetWidth)
            $(".content-wrapper, .right-side").css('min-height', controlSidebar.height());
        }

      }
    },
    fixSidebar: function () {
      //Make sure the body tag has the .fixed class
      if (!$("body").hasClass("fixed")) {
        if (typeof $.fn.slimScroll != 'undefined') {
          $(".sidebar").slimScroll({destroy: true}).height("auto");
        }
        return;
      } else if (typeof $.fn.slimScroll == 'undefined' && window.console) {
        window.console.error("Error: the fixed layout requires the slimscroll plugin!");
      }
      //Enable slimscroll for fixed layout
      if ($.AdminLTE.options.sidebarSlimScroll) {
        if (typeof $.fn.slimScroll != 'undefined') {
          //Destroy if it exists
          $(".sidebar").slimScroll({destroy: true}).height("auto");
          //Add slimscroll
          $(".sidebar").slimscroll({
            height: ($(window).height() - $(".main-header").height()) + "px",
            color: "rgba(0,0,0,0.2)",
            size: "3px"
          });
        }
      }
    }
  };

  /* PushMenu()
   * ==========
   * Adds the push menu functionality to the sidebar.
   *
   * @type Function
   * @usage: $.AdminLTE.pushMenu("[data-toggle='offcanvas']")
   */
  $.AdminLTE.pushMenu = {
    activate: function (toggleBtn) {
      //Get the screen sizes
      var screenSizes = $.AdminLTE.options.screenSizes;

      //Enable sidebar toggle
      $(document).on('click', toggleBtn, function (e) {
        e.preventDefault();

        //Enable sidebar push menu
        if ($(window).width() > (screenSizes.sm - 1)) {
          if ($("body").hasClass('sidebar-collapse')) {
            $("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
          } else {
            $("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
          }
        }
        //Handle sidebar push menu for small screens
        else {
          if ($("body").hasClass('sidebar-open')) {
            $("body").removeClass('sidebar-open').removeClass('sidebar-collapse').trigger('collapsed.pushMenu');
          } else {
            $("body").addClass('sidebar-open').trigger('expanded.pushMenu');
          }
        }
      });

      $(".content-wrapper").click(function () {
        //Enable hide menu when clicking on the content-wrapper on small screens
        if ($(window).width() <= (screenSizes.sm - 1) && $("body").hasClass("sidebar-open")) {
          $("body").removeClass('sidebar-open');
        }
      });

      //Enable expand on hover for sidebar mini
      if ($.AdminLTE.options.sidebarExpandOnHover
        || ($('body').hasClass('fixed')
        && $('body').hasClass('sidebar-mini'))) {
        this.expandOnHover();
      }
    },
    expandOnHover: function () {
      var _this = this;
      var screenWidth = $.AdminLTE.options.screenSizes.sm - 1;
      //Expand sidebar on hover
      $('.main-sidebar').hover(function () {
        if ($('body').hasClass('sidebar-mini')
          && $("body").hasClass('sidebar-collapse')
          && $(window).width() > screenWidth) {
          _this.expand();
        }
      }, function () {
        if ($('body').hasClass('sidebar-mini')
          && $('body').hasClass('sidebar-expanded-on-hover')
          && $(window).width() > screenWidth) {
          _this.collapse();
        }
      });
    },
    expand: function () {
      $("body").removeClass('sidebar-collapse').addClass('sidebar-expanded-on-hover');
    },
    collapse: function () {
      if ($('body').hasClass('sidebar-expanded-on-hover')) {
        $('body').removeClass('sidebar-expanded-on-hover').addClass('sidebar-collapse');
      }
    }
  };

  /* Tree()
   * ======
   * Converts the sidebar into a multilevel
   * tree view menu.
   *
   * @type Function
   * @Usage: $.AdminLTE.tree('.sidebar')
   */
  $.AdminLTE.tree = function (menu) {
    var _this = this;
    var animationSpeed = $.AdminLTE.options.animationSpeed;
    $(document).off('click', menu + ' li a')
      .on('click', menu + ' li a', function (e) {
        //Get the clicked link and the next element
        var $this = $(this);
        var checkElement = $this.next();

        //Check if the next element is a menu and is visible
        if ((checkElement.is('.treeview-menu')) && (checkElement.is(':visible')) && (!$('body').hasClass('sidebar-collapse'))) {
          //Close the menu
          checkElement.slideUp(animationSpeed, function () {
            checkElement.removeClass('menu-open');
            //Fix the layout in case the sidebar stretches over the height of the window
            //_this.layout.fix();
          });
          checkElement.parent("li").removeClass("active");
        }
        //If the menu is not visible
        else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
          //Get the parent menu
          var parent = $this.parents('ul').first();
          //Close all open menus within the parent
          var ul = parent.find('ul:visible').slideUp(animationSpeed);
          //Remove the menu-open class from the parent
          ul.removeClass('menu-open');
          //Get the parent li
          var parent_li = $this.parent("li");

          //Open the target menu and add the menu-open class
          checkElement.slideDown(animationSpeed, function () {
            //Add the class active to the parent li
            checkElement.addClass('menu-open');
            parent.find('li.active').removeClass('active');
            parent_li.addClass('active');
            //Fix the layout in case the sidebar stretches over the height of the window
            _this.layout.fix();
          });
        }
        //if this isn't a link, prevent the page from being redirected
        if (checkElement.is('.treeview-menu')) {
          e.preventDefault();
        }
      });
  };

  /* ControlSidebar
   * ==============
   * Adds functionality to the right sidebar
   *
   * @type Object
   * @usage $.AdminLTE.controlSidebar.activate(options)
   */
  $.AdminLTE.controlSidebar = {
    //instantiate the object
    activate: function () {
      //Get the object
      var _this = this;
      //Update options
      var o = $.AdminLTE.options.controlSidebarOptions;
      //Get the sidebar
      var sidebar = $(o.selector);
      //The toggle button
      var btn = $(o.toggleBtnSelector);

      //Listen to the click event
      btn.on('click', function (e) {
        e.preventDefault();
        //If the sidebar is not open
        if (!sidebar.hasClass('control-sidebar-open')
          && !$('body').hasClass('control-sidebar-open')) {
          //Open the sidebar
          _this.open(sidebar, o.slide);
        } else {
          _this.close(sidebar, o.slide);
        }
      });

      //If the body has a boxed layout, fix the sidebar bg position
      var bg = $(".control-sidebar-bg");
      _this._fix(bg);

      //If the body has a fixed layout, make the control sidebar fixed
      if ($('body').hasClass('fixed')) {
        _this._fixForFixed(sidebar);
      } else {
        //If the content height is less than the sidebar's height, force max height
        if ($('.content-wrapper, .right-side').height() < sidebar.height()) {
          _this._fixForContent(sidebar);
        }
      }
    },
    //Open the control sidebar
    open: function (sidebar, slide) {
      //Slide over content
      if (slide) {
        sidebar.addClass('control-sidebar-open');
      } else {
        //Push the content by adding the open class to the body instead
        //of the sidebar itself
        $('body').addClass('control-sidebar-open');
      }
    },
    //Close the control sidebar
    close: function (sidebar, slide) {
      if (slide) {
        sidebar.removeClass('control-sidebar-open');
      } else {
        $('body').removeClass('control-sidebar-open');
      }
    },
    _fix: function (sidebar) {
      var _this = this;
      if ($("body").hasClass('layout-boxed')) {
        sidebar.css('position', 'absolute');
        sidebar.height($(".wrapper").height());
        if (_this.hasBindedResize) {
          return;
        }
        $(window).resize(function () {
          _this._fix(sidebar);
        });
        _this.hasBindedResize = true;
      } else {
        sidebar.css({
          'position': 'fixed',
          'height': 'auto'
        });
      }
    },
    _fixForFixed: function (sidebar) {
      sidebar.css({
        'position': 'fixed',
        'max-height': '100%',
        'overflow': 'auto',
        'padding-bottom': '50px'
      });
    },
    _fixForContent: function (sidebar) {
      $(".content-wrapper, .right-side").css('min-height', sidebar.height());
    }
  };

  /* BoxWidget
   * =========
   * BoxWidget is a plugin to handle collapsing and
   * removing boxes from the screen.
   *
   * @type Object
   * @usage $.AdminLTE.boxWidget.activate()
   *        Set all your options in the main $.AdminLTE.options object
   */
  $.AdminLTE.boxWidget = {
    selectors: $.AdminLTE.options.boxWidgetOptions.boxWidgetSelectors,
    icons: $.AdminLTE.options.boxWidgetOptions.boxWidgetIcons,
    animationSpeed: $.AdminLTE.options.animationSpeed,
    activate: function (_box) {
      var _this = this;
      if (!_box) {
        _box = document; // activate all boxes per default
      }
      //Listen for collapse event triggers
      $(_box).on('click', _this.selectors.collapse, function (e) {
        e.preventDefault();
        _this.collapse($(this));
      });

      //Listen for remove event triggers
      $(_box).on('click', _this.selectors.remove, function (e) {
        e.preventDefault();
        _this.remove($(this));
      });
    },
    collapse: function (element) {
      var _this = this;
      //Find the box parent
      var box = element.parents(".box").first();
      //Find the body and the footer
      var box_content = box.find("> .box-body, > .box-footer, > form  >.box-body, > form > .box-footer");
      if (!box.hasClass("collapsed-box")) {
        //Convert minus into plus
        element.children(":first")
          .removeClass(_this.icons.collapse)
          .addClass(_this.icons.open);
        //Hide the content
        box_content.slideUp(_this.animationSpeed, function () {
          box.addClass("collapsed-box");
        });
      } else {
        //Convert plus into minus
        element.children(":first")
          .removeClass(_this.icons.open)
          .addClass(_this.icons.collapse);
        //Show the content
        box_content.slideDown(_this.animationSpeed, function () {
          box.removeClass("collapsed-box");
        });
      }
    },
    remove: function (element) {
      //Find the box parent
      var box = element.parents(".box").first();
      box.slideUp(this.animationSpeed);
    }
  };
}

/* ------------------
 * - Custom Plugins -
 * ------------------
 * All custom plugins are defined below.
 */

/*
 * BOX REFRESH BUTTON
 * ------------------
 * This is a custom plugin to use with the component BOX. It allows you to add
 * a refresh button to the box. It converts the box's state to a loading state.
 *
 * @type plugin
 * @usage $("#box-widget").boxRefresh( options );
 */
(function ($) {

  "use strict";

  $.fn.boxRefresh = function (options) {

    // Render options
    var settings = $.extend({
      //Refresh button selector
      trigger: ".refresh-btn",
      //File source to be loaded (e.g: ajax/src.php)
      source: "",
      //Callbacks
      onLoadStart: function (box) {
        return box;
      }, //Right after the button has been clicked
      onLoadDone: function (box) {
        return box;
      } //When the source has been loaded

    }, options);

    //The overlay
    var overlay = $('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');

    return this.each(function () {
      //if a source is specified
      if (settings.source === "") {
        if (window.console) {
          window.console.log("Please specify a source first - boxRefresh()");
        }
        return;
      }
      //the box
      var box = $(this);
      //the button
      var rBtn = box.find(settings.trigger).first();

      //On trigger click
      rBtn.on('click', function (e) {
        e.preventDefault();
        //Add loading overlay
        start(box);

        //Perform ajax call
        box.find(".box-body").load(settings.source, function () {
          done(box);
        });
      });
    });

    function start(box) {
      //Add overlay and loading img
      box.append(overlay);

      settings.onLoadStart.call(box);
    }

    function done(box) {
      //Remove overlay and loading img
      box.find(overlay).remove();

      settings.onLoadDone.call(box);
    }

  };

})(jQuery);

/*
 * EXPLICIT BOX CONTROLS
 * -----------------------
 * This is a custom plugin to use with the component BOX. It allows you to activate
 * a box inserted in the DOM after the app.js was loaded, toggle and remove box.
 *
 * @type plugin
 * @usage $("#box-widget").activateBox();
 * @usage $("#box-widget").toggleBox();
 * @usage $("#box-widget").removeBox();
 */
(function ($) {

  'use strict';

  $.fn.activateBox = function () {
    $.AdminLTE.boxWidget.activate(this);
  };

  $.fn.toggleBox = function () {
    var button = $($.AdminLTE.boxWidget.selectors.collapse, this);
    $.AdminLTE.boxWidget.collapse(button);
  };

  $.fn.removeBox = function () {
    var button = $($.AdminLTE.boxWidget.selectors.remove, this);
    $.AdminLTE.boxWidget.remove(button);
  };

})(jQuery);

/*
 * TODO LIST CUSTOM PLUGIN
 * -----------------------
 * This plugin depends on iCheck plugin for checkbox and radio inputs
 *
 * @type plugin
 * @usage $("#todo-widget").todolist( options );
 */
(function ($) {

  'use strict';

  $.fn.todolist = function (options) {
    // Render options
    var settings = $.extend({
      //When the user checks the input
      onCheck: function (ele) {
        return ele;
      },
      //When the user unchecks the input
      onUncheck: function (ele) {
        return ele;
      }
    }, options);

    return this.each(function () {

      if (typeof $.fn.iCheck != 'undefined') {
        $('input', this).on('ifChecked', function () {
          var ele = $(this).parents("li").first();
          ele.toggleClass("done");
          settings.onCheck.call(ele);
        });

        $('input', this).on('ifUnchecked', function () {
          var ele = $(this).parents("li").first();
          ele.toggleClass("done");
          settings.onUncheck.call(ele);
        });
      } else {
        $('input', this).on('change', function () {
          var ele = $(this).parents("li").first();
          ele.toggleClass("done");
          if ($('input', ele).is(":checked")) {
            settings.onCheck.call(ele);
          } else {
            settings.onUncheck.call(ele);
          }
        });
      }
    });
  };
}(jQuery));

//# sourceMappingURL=app.js.map
