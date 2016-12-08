@extends('layouts.frontend')
@section('title', $post->title)

@section('content')
<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url('{{ asset('files/images/01-heading.jpg') }}')">
    <div class="container">
        <div class="page-name">
            <h1>{{ $post->title }}</h1>
            <span>Tác Giả: {{ $post->author }}</span>
        </div>
    </div>
</section>

<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-single-item">
                    @if(! $post->images->isEmpty())
                    <div class="slider">
                        <div class="fullwidthbanner-container">
                            <div class="fullwidthbanner">
                                <ul>
                                    @foreach($post->images as $image)
                                    <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
                                        <img src="{{ $image->url }}" data-fullwidthcentering="on" alt="slide">
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="blog-single-content">
                        <h3><a href="">{{ $post->title }}</a></h3>
                        <span><a href="#">{{ $post->created_at }}</a></span>
                        <div class="clearfix"></div>
                        <span>
                            @foreach($post->tags as $tag)
                                @if(! $loop->last)
                                <a href="">{{ $tag->name }}</a>,
                                @else
                                <a href="">{{ $tag->name }}</a>
                                @endif
                            @endforeach
                        </span>
                        <p>{!! $post->content !!}</p>
                    </div>

                    <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-item">
                    <h2>Chia Sẻ</h2>
                    <div class="dec-line">
                    </div>
                    <div class="social-icons">
                        <ul>
                            <div class="fb-like" data-href="{{ url()->current() }}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                        </ul>
                    </div>
                </div>
                <div class="widget-item">
                    <h2>Bài Viết Gần Đây</h2>
                    <div class="dec-line"></div>
                    <ul class="recent-item">
                        @foreach($featuredPosts as $post)
                            <li class="recent-post-item">
                                <a href="{{ route('frontend.post.show', $post->slug) }}">
                                    <img src="{{ $post->thumbnail !== null ? $post->thumbnail->getUrl() : asset('files/images/01-portfolio.jpg') }}" alt="">
                                    <span class="post-title">{{ str_limit($post->title, 25) }}</span>
                                </a>
                                <span class="post-info">
                                    @if($post->author)
                                        <a href="">{{ $post->author or '' }}</a> -
                                    @endif
                                    <a href="">{{ $post->created_at }}</a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
