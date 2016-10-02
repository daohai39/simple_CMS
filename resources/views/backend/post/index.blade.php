@extends('layouts.backend')

@push('pre-styles')
<link rel="stylesheet" type="text/css" href='{{ asset("assets/vendor/datatables-bs/css/dataTables.bootstrap.min.css") }}'>
<link rel="stylesheet" type="text/css" href='{{ asset("assets/vendor/datatables-responsive-bs/css/responsive.bootstrap.min.css") }}'>
@endpush

@section('title', 'Bài Đăng')
@section('content-header', 'Bài Đăng')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Danh sách bài đăng</h3>
        </div>
        <div class="box-body">
            <table id="posts-table" class="table dt-responsive nowrap" cellspacing="0"  width="100%">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Tác Vụ</th>
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
    var table = new DataTables("#posts-table", {
        ajax: laroute.route('admin.post.index'),
        columns: [
            { data: 'title', name: 'title' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false}
        ],
        order: [[1, 'asc']]
    });
</script>
@endpush
