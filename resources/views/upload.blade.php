@extends('layouts.backend')

@section('content')

<div class="container">
  	<form action="{{ route('admin.upload.store') }}" method="POST" enctype="multipart/form-data">
  	    {{ csrf_field() }}
        <div class="form-inline">
            <div class="form-group">
                <input type="file" name="image">
            </div>
          	<button type="submit" class="btn btn-sm btn-primary">Upload</button>
        </div>
    </form>
</div> <!-- /container -->

@endsection