@extends('layouts.backend')

@section('title', 'Tạo danh mục')
@section('content-header', 'Tạo danh mục')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.category.store') }}" method="POST" class="form-horizontal">
                @include('backend.category._form')
                <div class="box-footer">
                    <a href="javascript:window.history.back()" class="btn btn-default">Hủy</a>
                    <button type="submit" class="btn btn-primary pull-right">Tạo</button>
                </div>
            </form>
        </div>
    </div>
@endsection

