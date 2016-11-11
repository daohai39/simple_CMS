@extends('layouts.frontend')

@section('title', $product->name)

@section('content')
<section class="page-heading wow fadeIn" data-wow-duration="1.5s">
	<div class="container">
		<ol class="breadcrumb">
			<li>
				<a href="#">Trang chủ</a>
			</li>
			<li class="active">{{ $product->name }}</li>
		</ol>
	</div>
</section>

<section class="single-project">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="single-project-item">
					<div class="slider">
						<div class="fullwidthbanner-container">
							<div class="fullwidthbanner">
								<ul>
									<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
										<img src="files/images/01-big-portfolio.jpg" data-fullwidthcentering="on" alt="slide">
									</li>
									<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
										<img src="files/images/02-big-portfolio.jpg" data-fullwidthcentering="on" alt="slide">
									</li>
									<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
										<img src="files/images/03-big-portfolio.jpg" data-fullwidthcentering="on" alt="slide">
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="single-content">	
						<h3><a href="#">{{ $product->name }}</a></h3>
						<span><a href="#">Syam Imeri</a> / <a href="#">{{ $product->created_at }}</a></span>
						<p>{{ $product->description }}</p>
						<div class="share-post">
							<span>Share on: <a href="#">facebook</a>, <a href="#">twitter</a>, <a href="#">linkedin</a>, <a href="#">instagram</a></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-project-sidebar">
					<div class="about-author">
						<img src="files/images/author.png" alt="author">
						<div class="author-contet">
							<h3>Syam Meri</h3>
							<span>Webdesigner</span>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt quis ullam explicabo facere numquam architecto.</p>
						</div>
					</div>
					<div class="info project-name">
						<span>Project name: <em>Redesign</em></span>
					</div>
					<div class="info data-share">
						<span>Data shared: <em>8 June 2015</em></span>
					</div>
					<div class="info category">
						<span>Category: <em>Webdesign</em></span>
					</div>
					<div class="info share-on">
						<div class="social-icons">
							<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>

<section class="similar-projects">
	<div class="container">
		<div class="item col-md-4">
	  		<figure>
				<img alt="1-image" src="files/images/01-portfolio.jpg">
				<figcaption>
					<h3>Normcore Dreamcatcher</h3>
					<p>Lorem ipsum dolor sit amet consectetur.</p>
				</figcaption>
			</figure>	
	    </div>
	    <div class="item col-md-4">
	  		<figure>
				<img alt="2-image" src="files/images/02-portfolio.jpg">
				<figcaption>
					<h3>Meggings Mixtape</h3>
					<p>Lorem ipsum dolor sit amet consectetur.</p>
				</figcaption>
			</figure>	
	    </div>
	    <div class="item col-md-4">
	  		<figure>
				<img alt="3-image" src="files/images/03-portfolio.jpg">
				<figcaption>
					<h3>Locavore Brooklyn</h3>
					<p>Lorem ipsum dolor sit amet consectetur.</p>
				</figcaption>
			</figure>
	    </div>
	</div>
</section>
@endsection