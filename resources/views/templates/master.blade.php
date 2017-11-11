<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Kuponhub</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="" name="description" />
	<meta content="Kupons" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" href="#">
	<!-- <link rel="stylesheet" href="{{ asset('validator/fv.css') }}" type="text/css" /> -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/select2.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/animsition.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css">
	<!-- Toastr -->
	<link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
	<!-- Theme styles -->
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
		<!-- Navigation Bar-->
		<header class="header">
			<div class="top-nav  navbar m-b-0 b-0">
				<div class="container">
					<div class="row">
						<!-- LOGO -->
						<div class="topbar-left col-sm-3 col-xs-4">
							<a href="{{ route('home') }}" class="logo"> <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-responsive"> </a>
						</div>
						<!-- End Logo container-->
						<div class="menu-extras col-sm-9 col-xs-8">
							<ul class="nav navbar-nav navbar-right pull-right">
								<li>
									<form role="search" class="app-search pull-left hidden-xs">
										<div class="input-group">
											<input class="form-control" id="search-box" placeholder="Search coupons ..." aria-label="Text input with multiple buttons"> 
										</div>
										<a href=""><i class="ti-search"></i></a> 
									</form>
									<ul id="results" class="dropdown-menu dropdown-menu-lg">
										<li class="notifi-title">Results</li>
										<li class="animsition-loading" id="loading_search" style="position: relative;margin-top: 15px;margin-bottom: 15px"></li>
										<!-- last list item -->
										<div id="coupon_results"></div>
									</ul>
								</li>
								@if (Auth::check())
								<li class="dropdown hidden-xs">
									<a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" onclick="loadCoupon()"> 
										<i class="ti-shopping-cart"></i> 
										<span class="badge badge-xs badge-danger" id="coupon_quantity">{{ count(App\User::find(Auth::user()->id)->coupons) }}</span> 
									</a>
									<ul class="dropdown-menu dropdown-menu-lg">

										<li class="notifi-title">My Coupons</li>
										<li class="animsition-loading" id="loading_coupon" style="position: relative;margin-top: 15px;margin-bottom: 15px"></li>
										<div id="my_coupon_list">

										</div>
										<!-- last list item -->
									</ul>
								</li>
								@endif
								@if (!Auth::check()) 
								<li class="dropdown user-box">
									<a href="" data-toggle='modal' data-target="#modal-signin" class="dropdown-toggle profile btn btn-default" data-toggle="dropdown" aria-expanded="true">
										Sign-in
									</a>
								</li>
								@else
								<li class="dropdown user-box">
									<a href="" class="dropdown-toggle profile btn btn-default" data-toggle="dropdown" aria-expanded="true">
										Welcome, {{ Auth::user()->name }}
									</a>
									<ul class="dropdown-menu" style="margin-top:16px">
										<li>
											<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											Logout
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
							@endif
						</ul>
						<div class="menu-item">
							<!-- Mobile menu toggle-->
							<a class="navbar-toggle">
								<div class="lines"> <span></span> <span></span> <span></span> </div>
							</a>
							<!-- End mobile menu toggle-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-custom shadow">
			<div class="container">
				<div id="navigation">
					<!-- Navigation Menu-->
					<ul class="navigation-menu">
						<li class="active"> <a href="{{ route('home') }}"><i class="ti-home"></i> <span> Home </span> </a> </li>
						<li class="has-submenu">
							<a href="#"><i class="ti-cut"></i> <span> Coupons </span> </a>
							<ul class="submenu">
								<li><a href="{{ route('coupons.index') }}">Coupon list</a> </li>
								<li><a href="{{ route('coupons.grid') }}">Coupon grid</a> </li>
								<li><a href="{{ route('coupons.gridImage') }}">Coupon grid image</a> </li>
							</ul>
						</li>
						<li class="has-submenu">
							<a href="{{ route('categories.index') }}">
								<i class="ti-list"></i> <span> Categories </span> 
							</a>
						</li>
						<li class="has-submenu">
							<a href="{{ route('stores.index') }}">
								<i class="ti-announcement"></i> <span> Stores </span> 
							</a>
							
						</li>
						<li class="has-submenu">
							<a href="{{ route('news.index') }}">
								<i class="ti-newspaper"></i> <span> News </span> 
							</a>
							
						</li>
					</ul>
					<!-- End navigation menu  -->
				</div>
			</div>
		</div>
	</header>
	<!-- Navigation ends -->
	@yield('content')
	<!-- Footer -->
	<footer id="footer">
		<div class="btmFooter">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 text-center">
						<ul class="list-inline list-unstyled">
							<li><a href="#">Australia</a> </li>
							<li><a href="#">North America</a> </li>
							<li><a href="#">South America</a> </li>
							<li><a href="#">India</a> </li>
							<li><a href="#">Africa</a> </li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 text-center m-t-20">
					<p> <strong>Copyright 2016 </strong> KuponHub - Coupons template made with <i class="ti-heart"></i> 
						<strong> by Codenpixel</strong> 
					</p>
				</div>
				<div class="col-sm-12 text-center m-t-30">
					<ul class="pay-opt list-inline list-unstyled">
						<li>
							<a href="#" title="#"> <img src="{{ asset('assets/images/logo.png') }}" class="img-responsive" alt=""> </a>
						</li>
						<li>
							<a href="#" title="#"> <img src="{{ asset('assets/images/payment/ax-icon.png') }}" class="img-responsive" alt=""> </a>
						</li>
						<li>
							<a href="#" title="#"> <img src="{{ asset('assets/images/payment/mb-icon.png') }}" class="img-responsive" alt=""> </a>
						</li>
						<li>
							<a href="#" title="#"> <img src="{{ asset('assets/images/payment/mst-icon.png') }}" class="img-responsive" alt=""> </a>
						</li>
						<li>
							<a href="#" title="#"> <img src="{{ asset('assets/images/payment/mstr-icon.png') }}" class="img-responsive" alt=""> </a>
						</li>
						<li>
							<a href="#" title="#"> <img src="{{ asset('assets/images/payment/paypal-icon.png') }}" class="img-responsive" alt=""> </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- start modal -->
	<!-- Modal Sign-up -->
	<div id="modal-signup" class="coupon_modal modal fade couponModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span> </button>
				<div class="coupon_modal_content">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 text-center">
							<h2 id="login-modal-title">Sign-up</h2>
						</div>

						<form id="form-signup">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<input type="text" name="name" id="name" class="form-control" placeholder="User name" required>
								</div>
								<div class="col-md-6 col-md-offset-3">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
								</div>
								<div class="col-md-6 col-md-offset-3">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="col-md-6 col-md-offset-3">
									<input type="password" name="re-password" class="form-control" placeholder="Re-password" data-validate-linked="password" required>
								</div>
								<div class="col-md-12 col-md-offset-3">
									<div class="col-md-6" align="center">
										<button class="btn btn-primary" type="submit">Sign-up</button>
										<button class="btn btn-danger" type="reset">Cancel</button>
									</div>
								</div>
								<div class="col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3"> 
								</div>
							</div>
						</form>

						<div class="row">
							<div class="col-sm-12">
								<div class="report">Have already an account? <span class="yes vote-link" data-src="#" onclick="signin()">Sign-in</span></div>
							</div>
							<div class="col-md-12">
								<div class="report">Or</div>
							</div>
							<div class="col-md-12">
								<h5 align="center">Connect with Social networks.</h5> 
							</div>
							<div class="col-md-12" align="center">
								<a href="" class="btn btn-primary"><span class="ti-facebook"></span>&nbsp Facebook</a>
								<a href="" class="btn btn-danger">Google&nbsp<span class="ti-google"></span></a>
							</div>
						</div>
					</div>
				</div>
				<!-- end: Coupon modal content -->
			</div>
		</div>
	</div>
	<!-- end: Modall -->
	<!-- Modal Sign-in -->
	<div id="modal-signin" class="coupon_modal modal fade couponModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span> </button>
				<div class="coupon_modal_content">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 text-center">
							<p>You haven't sign-in yet! </p>
							<h2 id="login-modal-title">Sign-in</h2>
						</div>

						<form id="form-signin">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<input type="email" name="email" id="email" class="form-control" placeholder="Email address" required='required'>
								</div>
								<div class="col-md-6 col-md-offset-3">
									<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="col-md-12 col-md-offset-3">
									<div class="col-md-6" align="center">
										<button class="btn btn-primary" type="submit">Sign-in</button>
										<button class="btn btn-danger" type="reset">Cancel</button>
									</div>
								</div>
								<div class="col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3"> 
								</div>
							</div>
						</form>

						<div class="row">
							<div class="col-sm-12">
								<div class="report">Do not have account? <span class="yes vote-link" data-src="#" onclick="signup()">Sign-up</span></div>
							</div>
							<div class="col-md-12">
								<div class="report">Or</div>
							</div>
							<div class="col-md-12">
								<h5 align="center">Connect with Social networks.</h5> 
							</div>
							<div class="col-md-12" align="center">
								<a href="{{ route('socialite.redirect',['provider'=>'facebook']) }}" class="btn btn-primary"><span class="ti-facebook"></span>&nbsp Facebook</a>
								<a href="{{ route('socialite.redirect',['provider'=>'google']) }}" class="btn btn-danger">Google&nbsp<span class="ti-google"></span></a>
							</div>
						</div>
					</div>
				</div>
				<!-- end: Coupon modal content -->
			</div>
		</div>
	</div>
	<!-- end: Modall -->
	<!-- Large modal -->
	<div id="coupon-modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span> </button>
				<div class="coupon_modal_content">

					<div class="row">
						<div class="col-sm-10 col-sm-offset-1 text-center">
							<h2 id="coupon_title">Save 30% off New Domains Names</h2>
							<p>Not applicable to ICANN fees, taxes, transfers,or gift cards. Cannot be used in conjunction with any other offer, sale, discount or promotion. After the initial purchase term.</p>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<h5 class="text-center text-uppercase m-t-20 text-muted">Click below to get your coupon code</h5>
							</div>

							<div class="col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3"> <a href="#" target="_blank" class="coupon_code alert alert-info"><span class="coupon_icon"><i class="ti-cut hidden-xs"></i></span>  DAZ50-8715 
							</a> 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="report">Did this coupon work? <span class="yes vote-link" data-src="#">Yes</span> <span class="no vote-link" data-src="#">No</span> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- end: Coupon modal content -->
		</div>
		<div class="newsletter-modal">
			<div class="newsletter-form">
				<h4><i class="ti-email"></i>Sign up for our weekly email newsletter with the best money-saving coupons.</h4>
				<div class="input-group">
					<input class="form-control input-lg" placeholder="Email" type="text"> 
					<span class="input-group-btn">
						<button class="btn btn-danger btn-lg" type="button">
							Subscribe
						</button>
					</span> 
				</div>
				<p><small>We’ll never share your email address with a third-party.</small> </p>
			</div>
		</div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class="active">
				<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="It worked">
					<i class="ti-check color-green"></i>
				</a> 
			</li>
			<li role="presentation">
				<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="I love it">
					<i class="ti-heart color-primary"></i>
				</a> 
			</li>
			<li role="presentation">
				<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="It didn't work"><i class="ti-close"></i>
				</a> 
			</li>
		</ul>
	</div>
</div>
<!-- end: Modall -->
<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/animsition.min.js') }}"></script>
<script src="{{ asset('owl.carousel/owl.carousel.min.js') }}"></script>
<!-- Toastr -->
<script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
<!-- Kupon js -->
<script src="{{ asset('assets/js/kupon.js') }}"></script>
<script type="text/javascript" src="{{ asset('validator/multifield.js') }}"></script>
<script type="text/javascript" src="{{ asset('validator/validator.js') }}"></script>
</body>
@stack('scripts')
<!-- Alert -->
<script type="text/javascript">
	@if (Session::has('success')) 
	toastr.success('{{ Session::get("success") }}');
	@endif
	@if (Session::has('warning')) 
	toastr.warning('{{ Session::get("warning") }}');
	@endif
	@if (Session::has('error')) 
	toastr.error('{{ Session::get("error") }}');
	@endif
</script>
<!-- My coupon list -->
<script type="text/javascript">
	function loadCoupon() {
		$('loading_coupon').css('display','block');
		$.ajax({
			url : "{{ route('getCoupon') }}",
		}).done(function(data) {
			var html = "";
			if (data.total>0) {
				$.each(data, function( index, value ) {
					if (index < 3) {
						html += '<li class="list-group">';
						html += '<a href="{{ route("stores.show") }}/'+value.store_id+'" class="list-group-item">';
						html += '<div class="media">';
						html += '<div class="media-left">';
						html += ' <img src="{{ Storage::disk("local")->url("") }}'+value.store_avatar+'" height="50px" alt="">';
						html += '</div>';
						html += '<div class="media-body clearfix">';
						html += '<div class="media-heading">';
						html += 'Up to '+value.discount+' %';
						html += '</div>';
						html += '<p class="m-0"> <small>'+value.store_name+'</small> </p>';
						html += '</div>';
						html += '</div>';
						html += '</a>';
						html += '</li>';
					}
				});
				html += '<a href="{{ route("coupons.myCoupons") }}" class="list-group-item"> <small>Print all coupons ('+data.total+') </small> </a>';
			} else {
				html += '<p align="center" style="margin-top:15px">No coupon\'s found!</p>';
			}
			$('#loading_coupon').css('display','none');
			$('#my_coupon_list').empty();
			$('#my_coupon_list').append(html);
		});
	}
</script>
<!-- Search coupon -->
<script type="text/javascript">
	$('#search-box').on('keyup',function(e) {
		$('#results').css('display','block');
		$('#coupon_results').empty();
		$('#loading_search').css('display','block');
		var keyword = $('#search-box').val();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});
		$.ajax({
			url : "{{ route('searchCoupon') }}",
			data : {keyword : keyword},
			type : "POST",
		}).done(function(data) {
			$('#loading_search').css('display','none');
			$('#coupon_results').empty();
			$('#coupon_results').append(data);
		});
	});
</script>
<!-- Close search box -->
<script type="text/javascript">
	$(document).on("click", function () {
		$("#results").hide();
	});
</script>
<!-- Get Code -->
<script type="text/javascript">
	function getCode(value) {
		$('.coupon_code').text('Loading...');
		$('#coupon_title').text('Loading...');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});
		$.ajax({
			url : "{{ route('coupons.getCode') }}",
			data : {id:value},
			type : "POST",
		}).done(function(data) {
			setTimeout(function() {
				$('.coupon_code').text(data.code);
				$('#coupon_title').text(data.title);
				@if (Auth::check())
				$('.coupon_code').attr('href','{{ route("coupons.activeCode",["user_id"=>Auth::user()->id]) }}/'+data.id);
				@endif
			},500);
		});
	}
</script>
<!-- Quick Auth -->
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': "{{ csrf_token() }}"
		}
	});
	function signup() {
		$('#modal-signin').modal('hide');
      // $('#modal-signup').modal('show');
      window.location.replace('{{ route("signup") }}')
  }
  function signin() {
  	$('#modal-signin').modal('show');
  	$('#modal-signup').modal('hide');
  }

  $('#form-signin').on('submit', function(e) {
  	e.preventDefault();

  	var email = $(this).find('#email').val();
  	var password = $(this).find('#password').val()
  	$.ajax({
  		url : '{{ route("quickSignin") }}',
  		type : 'POST',
  		data : {email:email,password:password},
  	}).done(function(data) {
  		$('#modal-signin').modal('hide');
  		if(data != -1){
  			setTimeout(function(){
  				$('.menu-extras').empty();
  				$('.menu-extras').append(data);
  				toastr.success('Sign-in success.');
  			},350);
  		}else{
  			toastr.error('Sign-in is failed!');
  		}
  	});
  });

</script>
</html>