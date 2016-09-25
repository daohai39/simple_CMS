@extends('layouts.backend')

@section('title', $product->name)
@section('page_title', 'San pham')
@section('content_header', $product->name)

@section('content')
	<p>{{ $product->name }}</p>
	<p>{{ $product->code }}</p>
	<p>{{ $product->author }}</p>

@section('title', $category->name)
@section('page_title', 'Danh Mục')
@section('content_header', $category->name)

@section('content')
	<p>{{ $category->name }}</p>
@endsection