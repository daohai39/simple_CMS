@extends('layouts.frontend')

@section('title', $post->title)

@section('content')
<section class="page-heading wow fadeIn" data-wow-duration="1.5s">
	<div class="container">
		<ol class="breadcrumb">
			<li>
				<a href="#">Trang chủ</a>
			</li>
			<li class="active">{{ $post->title }}</li>
		</ol>
	</div>
</section>

<section class="blog-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="blog-single-item">
					<img src="../files/images/01-big-blog.jpg" alt="">
					<div class="blog-single-content">	
						<h3><a href="">{{ $post->title }}</a></h3>
						<span><a href="#">Manohar Raj</a> / <a href="#">{{ $post->created_at }}</a></span>
						<p>{{ $post->content }}</p>
						<div class="share-post">
							<span>Share on: <a href="#">facebook</a>, <a href="#">twitter</a>, <a href="#">linkedin</a>, <a href="#">instagram</a></span>
						</div>
					</div>
				</div>
				<div class="blog-comments">
					<h2>7 Comments</h2>
					<ul class="coments-content">
						<li class="first-comment-item">
							<img src="../files/images/01-author-comment.jpg" alt="">
							<span class="author-title"><a href="#">Akhil Raj</a></span>
							<span class="comment-date">10 May 2015 / <a href="#">Reply</a>
							</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, libero sit amet maximus ultricies, tortor justo venenatis justo, ac auctor quam lorem ac lectus.</p>
						</li>
						<li class="second-comment-item">
							<img src="../files/images/02-author-comment.jpg" alt="">
							<span class="author-title"><a href="#">Meera</a></span>
							<span class="comment-date">12 May 2015 / <a href="#">Reply</a>
							</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, libero sit amet maximus ultricies, tortor justo venenatis justo.</p>
						</li>
						<li class="third-comment-item">
							<img src="../files/images/03-author-comment.jpg" alt="">
							<span class="author-title"><a href="#">Joseph</a></span>
							<span class="comment-date">14 June 2015 / <a href="#">Reply</a>
							</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, libero sit amet maximus ultricies, tortor justo venenatis justo, ac auctor quam lorem ac lectus.</p>
						</li>
					</ul>
				</div>
				<div class="submit-comment col-sm-12">
					<h2>Leave A Comment</h2>
					<form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
						<div class=" col-md-4 col-sm-4 col-xs-6">
							<input type="text" class="blog-search-field" name="s" placeholder="Your name..." value="">
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
							<input type="text" class="blog-search-field" name="s" placeholder="Your email..." value="">
						</div>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<input type="text" class="subject" name="s" placeholder="Subject..." value="">
						</div>
						<div class="col-md-12 col-sm-12">
							<textarea id="message" class="input" name="message" placeholder="Comment..."></textarea>
						</div>
						<div class="submit-coment col-md-12">
							<div class="btn-black">
								<a href="#">Submit now</a>
							</div>
						</div>
					</form>		
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection