<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Khai Pham | @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendor/nprogress/nprogress.css') }}" rel="stylesheet">

    @stack('pre-styles')
    <!-- Custom Theme Style -->
    <link href="{{ elixir('css/backend.css') }}" rel="stylesheet">
    @stack('post-styles')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-user"></i> <span>Admin page</span></a>
            </div>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('backend._partials.menu_profile')
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            @include('backend._partials.sidebar')
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        @include('backend._partials.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('page_title')</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@yield('content_header')</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('backend._partials.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendor/fastclick/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendor/nprogress/nprogress.js') }}"></script>

    @stack('pre-scripts')
    <!-- Custom Theme Scripts -->
    <script src="{{ elixir('js/backend.js') }}"></script>
    @stack('post-scripts')
  </body>
</html>
