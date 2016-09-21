@extends('layouts.backend')

@section('title', 'Danh Mục')
@section('page_title', 'Danh Mục')
@section('content_header', 'Danh Mục')

@section('content')
    <table id="categories-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="50%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Tác Vụ</th>
            </tr>
        </thead>
    </table>
@endsection

@push('pre-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}">
@endpush

@push('pre-scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
@endpush

@push('post-scripts')
    <script>
        // $('#categories-table').DataTable();
        new DataTables("#categories-table", {
            ajax: laroute.route('admin.category.index'),
            columns: [
                { data: 'name', name: 'name' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
    </script>
@endpush
