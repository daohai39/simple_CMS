@extends('layouts.frontend')
@section('title', $category->name)

@section('content')
    <section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url('{{ asset('files/images/01-heading.jpg') }}')">
        <div class="container">
            <div class="page-name">
                <h1>{{ $category->name }}</h1>
                <span>Thiết kế bởi Khai Pham Architecture</span>
            </div>
        </div>
    </section>

	<section class="portfolio on-portfolio">
		<div class="container">
			<div class="row" >
				<div class="row">
				    @foreach($products as $product)
				    	<div class="item col-md-3 col-sm-6 col-xs-12 furniture">
				    		<a href="{{ route('frontend.slug.show', ['slug' => $product->slug]) }}">
						  		<figure>
			    					<img alt="{{ $product->name }}" src="{{ $product->thumbnail !== null ? $product->thumbnail->getUrl() : asset('files/images/01-portfolio.jpg') }}">
			    					<figcaption>
			        					<h3> {{ $product->name }}</h3>
			        					<p>{{ str_limit($product->description, 150) }}</p>
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
