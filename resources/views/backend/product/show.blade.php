@extends('layouts.backend')

@section('title', $category->name)
@section('page_title', 'Danh Mục')
@section('content_header', $category->name)

@section('content')
	<p>{{ $category->name }}</p>
@endsection