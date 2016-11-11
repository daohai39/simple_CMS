@extends('layouts.backend')

@push('pre-styles')
<link rel="stylesheet" type="text/css" href='{{ asset("assets/vendor/datatables-bs/css/dataTables.bootstrap.min.css") }}'>
<link rel="stylesheet" type="text/css" href='{{ asset("assets/vendor/datatables-responsive-bs/css/responsive.bootstrap.min.css") }}'>
@endpush

@section('title', 'Project')
@section('content-header', 'Project')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <a href="{{ route('admin.project.create') }}" class="btn btn-xs btn-primary">Add New</a>
        </div>
        <div class="box-body">
            <table id="projects-table" class="table dt-responsive nowrap" cellspacing="0"  width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Customer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('pre-scripts')
<script src='{{ asset("assets/vendor/datatables/js/jquery.dataTables.min.js") }}' type="text/javascript"></script>
<script src='{{ asset("assets/vendor/datatables-responsive/js/dataTables.responsive.min.js") }}' type="text/javascript"></script>
<script src='{{ asset("assets/vendor/datatables-bs/js/dataTables.bootstrap.min.js") }}' type="text/javascript"></script>
<script src='{{ asset("assets/vendor/datatables-responsive-bs/js/responsive.bootstrap.js") }}' type="text/javascript"></script>
@endpush

@push('post-scripts')
<script>
    var table = new DataTables("#projects-table", {
        ajax: laroute.route('admin.project.index'),
        columns: [
            { data: 'name', name: 'name' },
            { data: 'status', name: 'name', orderable: false, searchable: false},
            { data: 'customer', name: 'customer.name'},
            { data: 'actions', name: 'actions', orderable: false, searchable: false}
        ],
        order: [[1, 'asc']]
    });
</script>
@endpush
