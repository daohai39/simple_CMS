@extends('layouts.frontend')

@section('title', $product->name)

@section('content')
<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url('{{ asset('files/images/01-heading.jpg') }}')">
    <div class="container">
        <div class="page-name">
            <h1>{{ $product->name }}</h1>
            <span>Designer: {{ $product->designer->name  }}</span>
        </div>
    </div>
</section>

<section class="single-project">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="single-project-item">
					@if(! $product->images->isEmpty())
                    <div class="slider">
                        <div class="fullwidthbanner-container">
                            <div class="fullwidthbanner">
                                <ul>
                                    @foreach($product->images as $image)
                                    <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
                                        <img src="{{ $image->url }}" data-fullwidthcentering="on" alt="slide">
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

					<div class="single-content">
						<h3><a href="#">{{ $product->name }}</a></h3>
						<span>
                            <a href="#">{{ $product->created_at }}</a>
                        </span>
						<p>{{ $product->description }}</p>
					</div>

                    <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-project-sidebar">
					<div class="about-author">
						<img style="max-width: 100%" src="{{ $product->designer->thumbnail !== null ? $product->designer->thumbnail->getUrl() : asset('files/images/author.png') }}" alt="author">
						<div class="author-contet">
							<h3>{{ $product->designer->name or '' }}</h3>
							<p>{{ $product->designer->description or '' }}</p>
						</div>
					</div>
					<div class="info project-name">
						<span>Project name: <em>{{ $product->name }}</em></span>
					</div>
					<div class="info data-share">
						<span>Data shared: <em>{{ $product->created_at }}</em></span>
					</div>
					<div class="info category">
						<span>Category: <em>{{ $product->category->name }}</em></span>
					</div>
					<div class="info share-on">
						<div class="social-icons">
							<ul>
								<li>
                                    <div class="fb-like" data-href="{{ url()->current() }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
