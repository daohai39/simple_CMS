<header class="site-header">
	<div id="main-header" class="main-header header-sticky">
		<div class="inner-header clearfix">
			<div class="logo">
				<a href="{{ route('frontend.index') }}"><img src="{{ $settings['logo'] }}" style="width:100px" alt="{{ $settings['name'] }}"></a>
                <h1 class="pull-right hidden-lg hidden-xs" style="font-weight: 300;">{{ $settings['name'] }}</h1>
			</div>
			<div class="header-right-toggle pull-right hidden-lg">
				<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
			</div>
			<nav class="main-navigation pull-right hidden-xs hidden-sm hidden-md">
				<ul>
                    <li><a href="{{ route('frontend.post.show', ['slug' => 'gioi-thieu']) }}">Giới Thiệu</a></li>
    				<li><a href="{{ route('frontend.post.index') }}">Bài Viết</a></li>
    				<li><a href="{{ route('frontend.slug.show', ['slug' => 'san-pham-thong-minh']) }}">Sản Phẩm Thông Minh</a></li>
    				<li><a href="#" class="has-submenu">Phòng Xông Hơi</a>
    					<ul class="sub-menu">
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-xong-kho']) }}">Phòng Xông Khô</a></li>
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-xong-uot']) }}">Phòng Xông Ướt</a></li>
    					</ul>
    				</li>
    				<li><a href="#" class="has-submenu">Nội Thất</a>
    					<ul class="sub-menu">
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-khach']) }}">Phòng Khách</a></li>
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-bep']) }}">Phòng Bếp</a></li>
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-ngu']) }}">Phòng Ngủ</a></li>
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-ve-sinh']) }}">Phòng Vệ Sinh</a></li>
    					</ul>
    				</li>
    				<li><a href="{{ route('frontend.slug.show', ['slug' => 'cong-trinh-hoan-thien']) }}">Công Trình Hoàn Thiện</a></li>
    				<li><a href="#" class="has-submenu">Ngoại Thất</a>
    					<ul class="sub-menu">
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'nha-lo']) }}">Nhà Lô</a></li>
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'biet-thu']) }}">Biệt Thự</a></li>
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'tieu-canh']) }}">Tiểu Cảnh</a></li>
    					</ul>
    				</li>
    				<li><a href="{{ route('frontend.slug.show', ['slug' => 'cau-thang']) }}">Cầu Thang</a></li>
    				<li><a href="{{ route('frontend.slug.show', ['slug' => 'dich-vu-sua-nha']) }}">Dịch Vụ Sửa Nhà</a></li>
    				<li><a href="#" class="has-submenu">Hàng Rào Cổng Sắt</a>
    					<ul class="sub-menu">
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'hang-rao']) }}">Hàng Rào</a></li>
    						<li><a href="{{ route('frontend.slug.show', ['slug' => 'cong-sat']) }}">Cổng Sắt</a></li>
    					</ul>
    				</li>
    			</ul>
			</nav>
		</div>
	</div>
</header>
