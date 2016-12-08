@extends('layouts.frontend')
@section('title', 'Trang Chủ')

@section('content')
<div class="slider">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<ul>
                @foreach($sliders as $slider)
				<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
					<img src="{{ $slider->images->first()->url or asset('files/images/01-slide.jpg') }}" data-fullwidthcentering="on" alt="slide">
					<div class="tp-caption first-line lft tp-resizeme start" data-x="center" data-hoffset="0" data-y="250" data-speed="1000" data-start="200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"
                    style = "
                        @if($slider->heading_size) font-size: {{ $slider->heading_size_pixel }} @endif;
                        @if($slider->heading_color) color: {{ $slider->heading_color }} @endif;
                    ">
                        {{ $slider->heading or '' }}
                    </div>
					<div class="tp-caption second-line lfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="440" data-speed="1000" data-start="800" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"
                    style = "
                        @if($slider->description_size) font-size: {{ $slider->description_size_pixel }} @endif;
                        @if($slider->description_color) color: {{ $slider->description_color }} @endif;
                    ">
                        {{ $slider->description or '' }}
                    </div>
                    @if($slider->url)
					<div class="tp-caption slider-btn sfb tp-resizeme start" data-x="center" data-hoffset="0" data-y="510" data-speed="1000" data-start="2200" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0"><a href="{{ $slider->url }}" class="btn btn-slider">Xem Thêm</a></div>
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
		<div class="section-heading">
			<h2 style="color: #fff">Sản Phẩm Bán Chạy</h2>
			<div style="background-color: #fff" class="section-dec"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="owl-demo" class="owl-carousel owl-theme">
                    @foreach($featuredProducts as $product)
					<div class="item">
                        <a href="{{ route('frontend.slug.show', ['slug' => $product->slug]) }}">
                            <figure>
                                <img alt="portfolio" src="{{ $product->thumbnail !== null ? $product->thumbnail->getUrl() : asset('files/images/01-portfolio.jpg') }}">
                                <figcaption>
                                    <h3>{{ $product->name }}</h3>
                                    <p>{{ str_limit($product->description, 100) }}</p>
                                </figcaption>
                            </figure>
                        </a>
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
            <h2>Những Bài Viết Mới</h2>
            <div class="section-dec"></div>
        </div>
        <div class="row">
            <div class="owl-navigation">
                <a class="btn prev fa fa-angle-left"></a>
                <a class="btn next fa fa-angle-right"></a>
            </div>
            <div class="col-md-12">
                <div id="owl-portfolio" class="owl-carousel owl-theme owl-navigation">
                    @foreach($featuredPosts as $post)
                    <div class="item blog-item">
                        <figure>
                            <a href="{{ route('frontend.post.show', $post->slug) }}">
                                <img src="{{ $post->thumbnail !== null ? $post->thumbnail->getUrl() : asset('files/images/01-portfolio.jpg') }}" alt="">
                            </a>
                            <h3><a href="{{ route('frontend.post.show', $post->slug) }}">{{ str_limit($post->title, 25) }}</a></h3>
                            <span>
                                @if($post->author)
                                    <a href="">{{ $post->author or '' }}</a> -
                                @endif
                                <a href="">{{ $post->created_at }}</a>
                            </span>
                            <p>{{ str_limit($post->description, 100) }}</p>
                            <div class="read-more">
                                <a href="{{ route('frontend.post.show', $post->slug) }}">Xem Thêm</a>
                            </div>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

