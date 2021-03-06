<footer class="footer">
      <div class="spacing"></div>
	  <div class="container">
	      <div class="row">
	        <div class="about col-md-8 col-xs-12">
                @if(isset($settings['about']))
	        	<h3>Giới Thiệu Chung</h3>
		        <p>
		          	{{ $settings['about'] or '' }}
		        </p>
                @endif
	        </div>
	        <div class="address col-md-4 col-xs-12">
	        	<h3>Liên hệ</h3>
	        	<ul class="socials">
                    @if(isset($settings['address']))
                    <li><span class="footer-header">Địa Chỉ: </span>{{ $settings['address'] }}</li>
                    <div class="clearfix"></div>
                    @endif

		            @if(isset($settings['phone']))
                    <li><span class="footer-header">Điện Thoại: </span>{{ $settings['phone'] }}</li>
                    <div class="clearfix"></div>
                    @endif

                    @if(isset($settings['email']))
                    <li><span class="footer-header">Email: </span>{{ $settings['email'] }}</li>
                    <div class="clearfix"></div>
                    @endif

                    @if(isset($settings['facebook']))
		            <li>
		            	<span class="footer-header">Follow us on</span>
			            <a href="{{ $settings['facebook']}}">
			            	<i class="fa fa-facebook fa"></i>acebook
			            </a>
		            </li>
                    @endif
	          </ul>
	        </div>
	      </div>
	  </div>
      <div class="spacing"></div>
</footer>
