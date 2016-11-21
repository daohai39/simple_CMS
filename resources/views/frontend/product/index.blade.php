@extends('layouts.frontend')

@section('title', $category->name)

@section('content')
<!-- 	<section class="page-heading wow fadeIn" data-wow-duration="1.5s">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<a href="#">Trang chủ</a>
				</li>
				<li class="active">{{ $category->name }}</li>
			</ol>
		</div>
	</section> -->

	<section class="portfolio on-portfolio">
		<div class="container">
			<div class="row" >
				<div class="page-heading wow fadeIn" data-wow-duration="1.5s">
					<ol class="breadcrumb">
						<li>
							<a href="#">Trang chủ</a>
						</li>
						<li class="active">{{ $category->name }}</li>
					</ol>
				</div>
				<div class="row">
				    @foreach($products as $product)
				    	<div class="item col-md-3 col-sm-6 col-xs-12 furniture">
				    		<a href="{{ route('frontend.slug.show', ['slug' => $product->slug]) }}">
						  		<figure>
			    					<img alt="{{ $product->name }}" src="{{ $product->thumbnail or 'files/images/01-portfolio.jpg' }}">
			    					<figcaption>
			        					<h3> {{ $product->name }}</h3>
			        					<p>{{ $product->description }}</p>
			    					</figcaption>
								</figure>	
							</a>
					    </div>
				    @endforeach
			    </div>
			</div>
			<div class="col-md-12">
				<div class="portfolio-page-nav text-center">
					{{ $products->links() }}
				</div>
			</div>
		</div>
	</section>
@endsection 