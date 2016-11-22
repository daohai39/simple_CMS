@extends('layouts.frontend')
@section('title','index')

@section('content')
				<div class="slider">
					<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<ul>
                                @foreach($sliders as $slider)
								<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
									<img src="{{ $slider->images->first()->url or asset('files/images/01-slide.jpg') }}" data-fullwidthcentering="on" alt="slide">
									<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{{ $slider->heading or '' }}</div>
									<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">{{ $slider->description or '' }}</div>
                                    @if($slider->url)
									<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="{{ $slider->url }}" class="btn btn-slider">Discover More</a></div>
                                    @endif
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>

<div class="clearfix"></div>


<section class="portfolio">
	<div class="container">
		<div class="section-heading-white">
			<h2>Featured Products</h2>
			<div class="section-dec"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach($featuredProducts as $product)
					<div class="item">
                        <figure>
                            <img alt="portfolio" src="{{ $product->thumbnail !== null ? $product->thumbnail->getUrl() : asset('files/images/01-portfolio.jpg') }}">
                            <figcaption>
                                <h3>{{ $product->name }}</h3>
                                <p>{{ str_limit($product->description, 100) }}</p>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
</section>


<section class="blog-posts">
    <div class="container">
        <div class="section-heading">
            <h2>Latest Posts</h2>
            <div class="section-dec"></div>
        </div>
        @foreach($featuredPosts as $post)
        <div class="blog-item">
            <div class="col-md-4">
                <a href="{{ route('frontend.post.show', $post->slug) }}"><img src="{{ $post->thumbnail !== null ? $post->thumbnail->getUrl() : asset('files/images/01-portfolio.jpg') }}" alt=""></a>
                <h3><a href="blog-single.html">{{ str_limit($post->title, 25) }}</a></h3>
                <span>
                    @if($post->author)
                        <a href="">{{ $post->author or '' }}</a> -
                    @endif
                    <a href="">{{ $post->created_at }}</a>
                </span>
                <p>{{ str_limit($post->description, 100) }}</p>
                <div class="read-more">
                    <a href="{{ route('frontend.post.show', $post->slug) }}">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

