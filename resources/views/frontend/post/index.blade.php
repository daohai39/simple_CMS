@extends('layouts.frontend')

@section('title','post' )

@section('content')
    <section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url('{{ asset('files/images/01-heading.jpg') }}')">
        <div class="container">
            <div class="page-name">
                <h1>Our Posts</h1>
                <span></span>
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
                                <img src="{{ $post->thumbnail or asset('files/images/01-portfolio.jpg') }}" alt="{{ $post->title }}">
                            </a>
							<h3>
                                <a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                            </h3>
							<span><a href="#">{{ $post->created_at }}</a></span>
							<p>{{ $post->description }}</p>
							<div class="read-more">
								<a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}">Read more</a>
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
