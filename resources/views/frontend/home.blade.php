@extends('layouts.frontend')
@section('title','index')

@section('content')
<!-- <div class="slider">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<ul>
                @foreach($sliders as $slider)
				<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
					<img src="{{ $slider->images->first()->url or '' }}" data-fullwidthcentering="on" alt="slide">
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
</div> -->

				<div class="slider">
					<div class="fullwidthbanner-container">
						<div class="fullwidthbanner">
							<ul>
								<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
									<img src="files/images/01-slide.jpg" data-fullwidthcentering="on" alt="slide">
									<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">YOM-DOWNLOAD ANYTHING</div>
									<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">From Yom you can download anything for free</div>
									<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="#" class="btn btn-slider">Discover More</a></div>
								</li>
								<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
									<img src="files/images/02-slide.jpg" data-fullwidthcentering="on" alt="slide">
									<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Create a Multi Author Blog</div>
									<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Using Yom you can create multi author Blog platform</div>
									<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="#" class=" second-btn btn btn-slider">Discover More</a></div>
								</li>
								<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
									<img src="files/images/03-slide.jpg" data-fullwidthcentering="on" alt="slide">
									<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Create an E-commerce Site</div>
									<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="340" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0">Using Yom your can create a Multi Author E-Commerce Website</div>
									<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="#" class="btn btn-slider">Discover More</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

<div class="clearfix"></div>

@foreach($covers as $cover)
    @if($loop->index % 2 == 0)
    <section class="services gray container-fluid">
        <div>
            <div class="left-image"></div>
        </div>
        <div class="container">
            <div class="right-text col-sm-12">
                <h4>{{ $cover->heading or '' }}</h4>
                <p><em>{{ $cover->content or '' }}</p>
                <br>
                @if($cover->url)
                <a href="{{ $cover->url }}">READ MORE...</a>
                @endif
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    @else
    <section class="call-to-action-2 container-fluid">
        <div class="container">
        <div class="left-text push-sm-right col-sm-12">
            <h4>{{ $cover->heading or '' }}</h4>
            <p><em>{{ $cover->content or '' }}</p>
            <br>
            @if($cover->url)
                <a href="{{ $cover->url }}">READ MORE...</a>
            @endif
        </div>
            <div class="right-image pull-sm-left col-sm-12"></div>
        </div>
    </section>
    <div class="clearfix"></div>
    @endif
@endforeach



<section class="portfolio">
	<div class="container">
		<div class="section-heading-white">
			<h2>Popular Products</h2>
			<div class="section-dec"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="owl-portfolio" class="owl-carousel owl-theme">
                    @foreach($featuredProducts as $product)
					<div class="item">
				  		<a href="{{ route('frontend.slug.show', ['slug' => $product->slug]) }}">
                            <figure>
                                <img alt="portfolio" src="files/images/01-portfolio.jpg">
                                <figcaption>
                                    <h3>{{ $product->name }}</h3>
                                    <p>{{ $product->description }}</p>
                                </figcaption>
                            </figure>
                        </a>
    				</div>
                    @endforeach
				</div>
			</div>
		</div>
		<div class="owl-navigation">
		  <a class="btn prev fa fa-angle-left"></a>
		  <a class="btn next fa fa-angle-right"></a>
		</div>
	</div>
</section>

<section class="testimonials">
	<div class="container">
		<div class="section-heading">
			<h2>Recent Posts</h2>
			<div class="section-dec"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach($featuredPosts as $post)
					<div class="item">
				  		<div class="testimonials-post">
                            <a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}"><h6>{{ $post->title }}</h6></a>
				  			<p>{{ $post->description }}</p>
				  		</div>
				    </div>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

