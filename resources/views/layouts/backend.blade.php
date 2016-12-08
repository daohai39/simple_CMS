<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Khai Pham Admin - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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
        <link rel="stylesheet" href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}">
        @stack('pre-styles')
        <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/backend/app.css') }}">
        @stack('post-styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @stack('head-scripts')
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('backend._partials.navbar')
            @include('backend._partials.left-sidebar')
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>@yield('content-header')</h1>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            @include('errors.validation-errors')
                            @include('flash::message')
                        </div>
                    </div>
                    @yield('content')
                </section>
            </div>
            @include('backend._partials.footer')
        </div>

        <script src="{{ asset('assets/vendor/jquery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/fastclick/fastclick.js') }}"></script>
        @stack('pre-scripts')
        <script src="{{ elixir('assets/js/backend/app.js') }}"></script>
        @stack('post-scripts')

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </body>
</html>
