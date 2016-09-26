@extends('layouts.backend')

@section('title', 'Sửa danh mục')
@section('content-header', 'Sửa danh mục')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="POST" class="form-horizontal">
                <input type="hidden" name="_method" value="PATCH">
                @include('backend.category._form')
                <div class="box-footer">
                    <a href="javascript:window.history.back()" class="btn btn-default">Hủy</a>
                    <button type="submit" class="btn btn-primary pull-right">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@endsection

