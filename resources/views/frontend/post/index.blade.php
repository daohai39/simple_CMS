@extends('layouts.frontend')

@section('title', 'Bài Viết')

@section('content')
    <section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url('{{ asset('files/images/01-heading.jpg') }}')">
        <div class="container">
            <div class="page-name">
                <h1>Bài Viết</h1>
                <span>Khai Pham Architecture</span>
            </div>
        </div>
    </section>

	<section class="on-blog-grid">
	    <div class="container">
            @foreach(array_chunk($posts->getCollection()->all(), 3) as $row)
			<div class="row">
                @foreach($row as $post)
					<div class="col-md-4">
						<div class="blog-item">
							<a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}">
                                <img src="{{ $post->thumbnail !== null ? $post->thumbnail->getUrl() : asset('files/images/01-portfolio.jpg') }}" alt="{{ $post->title }}">
                            </a>
							<h3>
                                <a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}">{{ str_limit($post->title, 30) }}</a>
                            </h3>
							<span><a href="#">{{ $post->created_at }}</a></span>
							<p>{{ str_limit($post->description, 100) }}</p>
							<div class="read-more">
								<a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}">Xem Thêm</a>
							</div>
						</div>
					</div>
                @endforeach
			</div>
            @endforeach

            <div class="blog-page-nav text-center">
                {{ $posts->links() }}
            </div>
		</div>
	</section>
@endsection
