<!DOCTYPE html>
<html lang="en-US">
    <head>
    	<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $settings['title'] }} - @yield('title')</title>
        <meta name="description" content="{{ $settings['meta-description'] or 'Khai Pham Architecture | Noi That Decoks' }}">
        <meta name="title"  content="{{ $settings['name'] or 'Khai Pham Architecture | Noi That Decoks' }}" />

        <link rel="apple-touch-icon" sizes="57x57" href="{{ url('storage/sources/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ url('storage/sources/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ url('storage/sources/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ url('storage/sources/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ url('storage/sources/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ url('storage/sources/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ url('storage/sources/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ url('storage/sources/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('storage/sources/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('storage/sources/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('storage/sources/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ url('storage/sources/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('storage/sources/favicon-16x16.png') }}">
        <meta name="msapplication-TileImage" content="{{ url('storage/sources/ms-icon-144x144.png') }}">
        <link rel="manifest" href="{{ url('storage/sources/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
        @stack('pre-styles')
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/settings.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/frontend/custom.css') }}">
        @stack('post-styles')

	</head>
    <body>
        <div class="sidebar-menu-container" id="sidebar-menu-container">
            <div class="sidebar-menu-push">
                <div class="sidebar-menu-overlay"></div>
                <div class="sidebar-menu-inner">
                    @include('frontend._partials.header')
                    @yield('content')
                    @include('frontend._partials.footer')
                    <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
                </div>
            </div>
            @include('frontend._partials.responsive-navbar')
        </div>

        <script src="{{ asset('assets/vendor/jquery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        @stack('pre-scripts')
        <script src="{{ asset('assets/js/frontend/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/custom.js') }}"></script>
        @stack('post-scripts')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    </body>
</html>
