<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="" class="site_title"><i class="fa fa-paw"></i> <span>System</span></a>
		</div>

		<div class="clearfix"></div>

		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="{{asset('images/user.png')}}" alt="..." class="img img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>XIN CHÀO,</span>
				<h2>{{ Auth::user()->name }}</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3></h3>
				<ul class="nav side-menu">
					<li><a><i class="fa fa-shopping-cart"></i>Tỉnh<span class="fa fa-chevron-down"></span></a>
					</li>
					<li><a><i class="fa fa-list-ul"></i>Huyện <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#">Danh sách</a></li>
							<li><a href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-credit-card"></i>Xã <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#">Danh sách</a></li>
							<li><a href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-credit-card"></i>Phòng ban <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#">Danh sách</a></li>
							<li><a href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-newspaper-o"></i>Nhân viên <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#">Danh sách</a></li>
							<li><a href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-newspaper-o"></i>Cuộc thi <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#">Danh sách</a></li>
							<li><a href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-newspaper-o"></i>Danh hiệu <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#">Danh sách</a></li>
							<li><a href="#">Thêm mới</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-newspaper-o"></i>Tài khoản <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="{{ route('user') }}">Danh sách</a></li>
							<li><a href="{{ route('user.create') }}">Thêm mới</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /sidebar menu -->
		</div>
	</div>
</div>