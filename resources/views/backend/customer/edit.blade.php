@extends('layouts.backend')

@section('title', 'Edit Customer')
@section('content-header', 'Edit Customer')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.customer.update', ['id' => $customer->id]) }}" method="POST" class="form-horizontal">
                <input type="hidden" name="_method" value="PATCH">
                @include('backend.customer._form')
                <div class="box-footer">
                    <a href="javascript:window.history.back()" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('pre-scripts')
    <script src="{{ asset('assets/vendor/parsley/parsley.min.js') }}"></script>
@endpush

@push('post-scripts')
  <!-- <script>
    new FormValidation().validate('form');
  </script> -->
@endpush

