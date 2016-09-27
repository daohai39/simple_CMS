@extends('layouts.backend')

@section('title', 'Sửa thẻ')
@section('content-header', 'Sửa thẻ')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.tag.update', ['id' => $tag->id]) }}" method="POST" class="form-horizontal">
                <input type="hidden" name="_method" value="PATCH">
                @include('backend.tag._form')
                <div class="box-footer">
                    <a href="javascript:window.history.back()" class="btn btn-default">Hủy</a>
                    <button type="submit" class="btn btn-primary pull-right">Sửa</button>
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

