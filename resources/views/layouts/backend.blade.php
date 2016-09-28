<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Khai Pham - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
    </body>
</html>
