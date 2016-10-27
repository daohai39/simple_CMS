<!DOCTYPE html>
<html lang="en-US">
    <head>
    	<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	    <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Khai Pham - @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>


        @stack('pre-styles')

        <link rel="stylesheet" href="{{ asset('assets/css/frontend/app.css') }}">
		
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

        <script src="{{ elixir('assets/js/frontend/app.js') }}"></script>

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
