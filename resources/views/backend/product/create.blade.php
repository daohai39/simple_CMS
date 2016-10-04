@extends('layouts.backend')

@section('title', 'Tạo sản phẩm')
@section('content-header', 'Tạo sản phẩm')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.product.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @include('backend.product._form')
                <div class="box-footer">
                    <a href="javascript:window.history.back()" class="btn btn-default">Hủy</a>
                    <button type="submit" class="btn btn-primary pull-right">Tạo</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/parsley/parsley.min.js') }}"></script>
@endpush

@push('post-scripts')
  <script>
    new FormValidation().validate('form');
  </script>
@endpush
