@extends('layouts.frontend')

@section('title','post' )

@section('content')
	<section class="page-heading wow fadeIn" data-wow-duration="1.5s">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<a href="#">Trang chủ</a>
				</li>
				<li class="active">Post</li>
			</ol>
		</div>
	</section>

	<section class="portfolio on-portfolio">
		<div class="container">
			<div class="row" >
			    @foreach($post as $pt)
			    	<div class="item col-md-4 col-sm-6 col-xs-12 furniture">
			    		<a href="{{ route('frontend.post.show', ['slug' => $pt->slug]) }}">
					  		<figure>
		    					<img alt="{{ $pt->title }}" src="{{ $pt->thumbnail or 'files/images/01-portfolio.jpg' }}">
		    					<figcaption>
		        					<h3> {{ $pt->title }}</h3>
		        					<p>{{ $pt->description }}</p>
		    					</figcaption>
							</figure>	
						</a>
				    </div>
			    @endforeach
			</div>
			<div class="col-md-12">
				<div class="portfolio-page-nav text-center">
					{{ $post->links() }}
				</div>
			</div>
		</div>
	</section>
@endsection 