@extends('layouts.backend')

@section('title', 'Create Category')
@section('content-header', 'Create Category')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.category.store') }}" method="POST" class="form-horizontal">
                @include('backend.category._form')
                <div class="box-footer">
                    <a href="javascript:window.history.back()" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
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
