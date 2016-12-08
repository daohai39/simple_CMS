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
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
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
            <div class="content-wrapper" style="margin: auto">
                <div class="container">
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

                        <div class="row">
                            <div class="col-md-5">
                                @if($project->isCompleted)
                                    <span class="label label-success">Completed</span>
                                @else
                                    <span class="label label-warning">Incomplete</span>
                                @endif

                                <form action="{{ route('admin.project.update', ['id' => $project->id]) }}" method="POST" class="form-horizontal">
                                    <input type="hidden" name="_method" value="PATCH">
                                    @include('backend.project._form')
                                </form>
                            </div>

                            @if($project->isCompleted)
                                <div class="col-md-7">
                                    <div class="box">
                                        <div class="box-body">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>Date Started</th>
                                                        <th>Date Finished</th>
                                                        <th>Total Expected Cost</th>
                                                        <th>Total Actual Cost</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $project->started_at }}</td>
                                                        <td>{{ $project->finished_at }}</td>
                                                        <td>{{ $project->total_expected_cost }}</td>
                                                        <td>{{ $project->total_actual_cost }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-7">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <label>Stages</label>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date Started</th>
                                                    <th>Date Finished</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach($project->stages as $stage)
                                                <tr>
                                                    <td>{{ $stage->name }}</td>
                                                    <td>{{ $stage->started_at or '' }}</td>
                                                    <td>{{ $stage->finished_at or '' }}</td>
                                                    <td>
                                                        @if($stage->isCompleted)
                                                        <span class="label label-success">Completed</span>
                                                        @else
                                                        <span class="label label-warning">Incomplete</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.stage.edit', ['id' => $stage->id]) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>View</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        <script src="{{ asset('assets/vendor/jquery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('assets/vendor/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/summernote/summernote.min.js') }}"></script>
        <script src="{{ elixir('assets/js/backend/app.js') }}"></script>
        <script>
            select2 = new Select2("#select2-project-customer", {
                placeholder: "Customer ...",
                tags: true,
                maximumSelectionLength: 1,
                allowClear: true,
                ajax: {
                    url: laroute.route("admin.customer.create"),
                    data: function (params) {
                        return {
                            q: params.term,
                            page: params.page,
                        }
                    },
                    processResults: function (response, params) {
                        params.page = params.page || 1;
                        return {
                            results: $.map(response.data, function (item) {
                                var text = '';
                                if(item['email']) {
                                    text = item['name']+' - '+item['email'];
                                }
                                return {
                                    text: text || item['name'],
                                    id: item['name']
                                }
                            }),
                            pagination: {
                                more: response.to < response.total
                            }
                        };
                    },
                }
            });
        </script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </body>
</html>
