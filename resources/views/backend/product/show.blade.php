@extends('layouts.backend')

@section('title', $product->name)
@section('page_title', 'San pham')
@section('content_header', $product->name)

@section('content')
	<p>{{ $product->name }}</p>
	<p>{{ $product->code }}</p>
	<p>{{ $product->author }}</p>

@endsection