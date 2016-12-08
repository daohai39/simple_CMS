<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Khai Pham Architecture | Noi That Decoks - 404 Page not found</title>
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}">
        @stack('pre-styles')
        <link rel="stylesheet" type="text/css" href="{{ elixir('assets/css/backend/app.css') }}">
        @stack('post-styles')
    </head>
    <body>
        <div class="container" style="margin-top: 15%">
            <div class="error-page">
                <h2 class="headline text-yellow" style="margin-top: -5%"> 404</h2>
                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                    </p>
                </div>
            </div>
        </div>
        <!-- ./wrapper -->
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
