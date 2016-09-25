@extends('layouts.backend')

@section('title', 'Tạo San Pham')
@section('page_title', 'San Pham')
@section('content_header', 'Tạo San Pham')
@section('title', 'Tạo Danh Mục')
@section('page_title', 'Danh Mục')
@section('content_header', 'Tạo Danh Mục')


@section('content')
	<form class="form-horizontal form-label-left" id="" data-parsley-trigger="keyup" method="POST" action="{{ route('admin.category.update', ['id' => $category->id]) }}">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">
      @include('backend.product._form')
      @include('backend.category._form')
      <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
          <a href="javascript:window.history.back()" class="btn btn-primary">Hủy</a>
          <button id="send" type="submit" class="btn btn-success">Sửa</button>
        </div>
      </div>
    </form>
@endsection

@push('pre-scripts')
	<script src="{{ asset('vendor/parsleyjs/parsley.min.js') }}"></script>
@endpush

@push('post-scripts')
<!-- Parsleyjs -->
  <script>
   	new FormValidation().validate('form');
  </script>
<!--Parsleyjs  -->
@endpush
