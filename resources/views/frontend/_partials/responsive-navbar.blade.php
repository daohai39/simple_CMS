<nav class="sidebar-menu slide-from-left">
	<div class="nano">
		<div class="content">
			<nav class="responsive-menu">
				<ul>
					<li><a href="{{ route('frontend.post.index') }}">Tin Tức</a></li>
					<li><a href="{{ route('frontend.slug.show', ['slug' => 'san-pham-thong-minh']) }}">Sản Phẩm Thông Minh</a></li>
					<li class="menu-item-has-children"><a href="#">Phòng Xông Hơi</a>
						<ul class="sub-menu">
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-xong-kho']) }}">Phòng Xông Khô</a></li>
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-xong-uot']) }}">Phòng Xông Ướt</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children"><a href="#">Nội Thất</a>
						<ul class="sub-menu">
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-khach']) }}">Phòng Khách</a></li>
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-bep']) }}">Phòng Bếp</a></li>
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-ngu']) }}">Phòng Ngủ</a></li>
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'phong-ve-sinh']) }}">Phòng Vệ Sinh</a></li>
						</ul>
					</li>
					<li><a href="{{ route('frontend.slug.show', ['slug' => 'cong-trinh-hoan-thien']) }}">Công Trình Hoàn Thiện</a></li>
					<li class="menu-item-has-children"><a href="#">Ngoại Thất</a>
						<ul class="sub-menu">
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'nha-lo']) }}">Nhà Lô</a></li>
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'biet-thu']) }}">Biệt Thự</a></li>
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'tieu-canh']) }}">Tiểu Cảnh</a></li>
						</ul>
					</li>
					<li><a href="{{ route('frontend.slug.show', ['slug' => 'cau-thang']) }}">Cầu Thang</a></li>
					<li><a href="{{ route('frontend.slug.show', ['slug' => 'dich-vu-sua-nha']) }}">Dịch Vụ Sửa Nhà</a></li>
					<li class="menu-item-has-children"><a href="#">Hàng Rào Cổng Sắt</a>
						<ul class="sub-menu">
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'hang-rao']) }}">Hàng Rào</a></li>
							<li><a href="{{ route('frontend.slug.show', ['slug' => 'cong-sat']) }}">Cổng Sắt</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</nav>
