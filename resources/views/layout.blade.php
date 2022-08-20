<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{-- Seo --}}
	<meta name="robots" content="index, follow" /><meta>
	<meta name="keywords" content="index, follow" /><meta>
	<link rel="canonical" href="http://localhost/tieu-luan/">
    <meta name="description" content="">
    <meta name="author" content="">
	{{-- Seo --}}
    <title>Home | E-Shopper</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{asset('public/front-end/css/bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/front-end/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/front-end/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/front-end/css/price-range2.css')}}" rel="stylesheet">
    <link href="{{asset('public/front-end/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/front-end/css/main1.css')}}" rel="stylesheet">
	<link href="{{asset('public/front-end/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('public/front-end/css/style_sign9.css')}}" rel="stylesheet">
	<link href="{{asset('public/front-end/css/sweetalert.css')}}" rel="stylesheet">      
</head><!--/head-->

<body>

	<div class="app-shopping">
		<header id="header"><!--header-->
			<div class="header-background">	
				<div class="header_top"><!--header_top-->
					<div class="container">
						<div class="row">
							<div class="col-sm-4"  style="width:25%; padding: 0">
								<div class="contactinfo">
									<ul class="nav nav-pills">
										<li><a href="tel:0907977341"><i class="fa fa-phone"></i>0907 977 341</a></li>
										<li><a href="#"><i class="fa fa-envelope"></i>minhnhat14712@gmail.com</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-7">
								<img style="width:100%; height:44px" src="{{asset('public/upload/banner/banner-min2.PNG')}}" alt="">
							</div>
							<div class="col-sm-1" style="height:44px; width:15%; padding: 0">
								<div class="social-icons pull-right">
									<ul class="nav navbar-nav">
										<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
										<li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
										<li><a href="#"><i class="fa-brands fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div><!--/header_top-->
			
				<div class="header-middle"><!--header-middle-->
					<div class="container">
						<div class="row">
							<div class="col-sm-2 header-middle-child">
								<div class="logo pull-left">
									<a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/front-end/images/home/logo.png')}}" alt="" /></a>
								</div>
							</div>
							<div class="col-sm-4 header-middle-child" style="display: flex; padding: 0">
								<form action="{{URL::to('/tim-kiem')}}" method="post">
									{{ csrf_field() }}
									<div class="pull-left">
										<span class="search_box">
											<input id="keywords" type="text" name="keyword_search" placeholder="Tìm kiếm...."/>
											<button type="button"><i class="fa fa-search"></i></button>
										</span>
									</div>
									<div id="search-ajax">
										{{-- <ul class="suggest-menu">
											<li class="suggest-item"><a href="">Quan jean</a></li>
											<li class="suggest-item"><a href="">Quan jean</a></li>
											<li class="suggest-item"><a href="">Quan jean</a></li>
											<li class="suggest-item"><a href="">Quan jean</a></li>
										</ul> --}}
									</div>
									
								</form>
							</div>
							<div class="col-sm-6 header-middle-child">
								<div class="shop-menu pull-right">
									<ul class="nav navbar-nav">
										<?php
										if(session()->get('customer_id')){
											?>
											<li><a href="{{URL::to('/wishlist/'.session()->get('customer_id'))}}"><i class="fa-solid fa-heart" style="font-size: 16px"></i>Yêu thích</a></li>
											<?php
										}else{
											?>
											<li class="check-account"><a href="#"><i class="fa-solid fa-heart" style="font-size: 16px"></i>Yêu thích</a></li>
											<?php
										}
										?>
										<?php
										if(session()->get('customer_id')){
											$customer_name = session()->get('customer_name');
											?>
											<li><a href="{{URL::to('/ordered/'.session()->get('customer_id'))}}"><i class="fa-brands fa-shopify" style="font-size: 16px"></i>Đơn hàng</a></li>
											<?php
										}else{
											?>
											<li class="check-account"><a href="#"><i class="fa-brands fa-shopify" style="font-size: 16px"></i>Đơn hàng</a></li>
											<?php
										}
										?>
										{{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> --}}
										<?php
										if(session()->get('customer_id')){
											?>
											<li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
											<?php
										}else{
											?>
											<li id="check-cart"><a href="#"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
											<?php
										}
										?>
										<?php
										if(session()->get('customer_id')){
											?>
											<li><a href="{{URL::to('/logout-customer')}}"><i class="fa-solid fa-right-to-bracket"></i>Đăng xuất</a></li>
											<input type="hidden" value="1" class="login-success">
											<?php
										}else{
											?>
											<li><a href="#" class="link-login-customer"><i class="fa fa-lock"></i>Đăng nhập/Đăng kí</a></li>
											<input type="hidden" value="0" class="login-success">
											<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div><!--/header-middle-->
				<div class="modal-sign">
					<div class="modal-inner">
						<section class="check-login"><!--form-->
							<div class="container-sign">
								<div class="primary-bg">
									<div class="login-close">
										<button id="btn-close-login">X</button>
									</div>
									{{-- <div class="title-note">Truy cập bằng máy tính để có trải nghiệm tốt hơn:></div> --}}
									<div class="box signin">
										<h2>Bạn đã có tài khoản?</h2>
										<button class="signinBtn">Đăng Nhập Ngay</button>
									</div>
						
									<div class="box signup">
										<h2>Bạn chưa có tài khoản?</h2>
										<button class="signupBtn">Đăng Ký Ngay</button>
									</div>
								</div>
								<div class="formBx">
									<div class="form signinForm">
										<form>
											{{ csrf_field() }}
											<h4>Đăng nhập</h4>
											<div class="form-group">
												<input type="text" id="user-email" name="customer_email"  placeholder="Email..." />
												<span class="form-message"></span>
											</div>
											<div class="form-group">
												<input type="password" id="user-password" name="customer_password" placeholder="Mật khẩu..." />
												<span class="form-message"></span>
											</div>
											<div class="form-group box-message">
												<i class="fa-solid fa-exclamation"></i>
												<span>Sai tài khoản hoặc mật khẩu vui lòng kiểm tra lại</span>
											</div>
											<div class="form-group">
												<button type="button" class="form-submit btn-signin">Đăng nhập</button>
											</div>
											<a href="#" class="forgot">Forgot Password?</a>
											<div class="login-more">
												<a><img style="width: 32px; height:32px" src="{{asset('public/front-end/images/home/googles_icon.png')}}" alt="">Google</a>
												<a><img src="{{asset('public/front-end/images/home/facebook_icon.png')}}" alt="">Facebook</a>
											</div>
										</form>
									</div>
						
									<div class="form signupForm">
										<form action="{{URL::to('/add-customer')}}" method="POST">
											{{ csrf_field() }}
											<h4>Đăng ký tài khoản</h4>
											<div class="form-group">
												<input type="text" id="new-user-name" name="customer_name"  placeholder="Tên của bạn" />
												<span class="form-message"></span>
											</div>
											<div class="form-group">
												<input type="email" id="new-user-email" name="customer_email" placeholder="Email"/>
												<span class="form-message"></span>
											</div>
											<div class="form-group">
												<input type="password" id="new-user-password" name="customer_password" placeholder="Mật khẩu"/>
												<span class="form-message"></span>
											</div>
											<div class="form-group">
												<input type="password" id="confirm-user-password" name="confirm_password" placeholder="Nhập lại mật khẩu"/>
												<span class="form-message"></span>
											</div>
											<div class="form-group">
												<button type="submit" class="form-submit btn-signup">Đăng ký</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</section><!--/form-->
					</div>
				</div>
		
				<div class="header-bottom"><!--header-bottom-->
					<div class="container">
						<div class="row">
							<ul class="col-sm-8 main-menu">
								<li>
									<a href="{{URL::to('/danh-muc-san-pham/1')}}">
										<i class="fa-solid fa-mobile"></i>
										<span>Điện thoại</span>
									</a>
								</li>
								<li>
									<a href="{{URL::to('/danh-muc-san-pham/2')}}">
										<i class="fa fa-laptop"></i>
										<span>Laptop</span>
									</a>
								</li>
								<li class="phukien">
									<a href="{{URL::to('/danh-muc-san-pham/3')}}">
										<i class="fa-solid fa-headphones"></i>
										<span>Phụ kiện</span>
									</a>
								</li>
								<li>
									<a href="{{URL::to('/danh-muc-san-pham/4')}}">
										<i class="fa-regular fa-clock"></i>
										<span>Đồng hồ thông minh</span>
									</a>
								</li>
								<li>
									<a href="">
										<i class="fa-regular fa-gem"></i>
										<span>Trang sức</span>
									</a>
								</li>
							</ul>
							<div class="col-sm-4">
								<div class="header-notice">
									<div>
										<span class="header-notice-icon">
											<i class="far fa-bell"></i>
											<span>Thông báo</span>
											<ul class="notice-box">
												<li><a href="" class="notice-item">
													<img src="{{asset('public/front-end/images/home/notice-sale.jpg')}}" alt="">
													<div class="notice-content">
														<div>Săn sale lớn nhân ngày 30/4</div>
														<div class="notice-date">20:10:2022</div>
													</div>
												</a></li>
												<li><a href="" class="notice-item">
													<img src="{{asset('public/front-end/images/home/notice-sale1.jpg')}}" alt="">
													<div class="notice-content">
														<div>Săn sale lớn trong năm nhân dịp quốc khánh 2/9</div>
														<div class="notice-date">20:10:2022</div>
													</div>
												</a></li>
												<li><a href="" class="notice-item">
													<img src="{{asset('public/front-end/images/home/notice-sale2.jpg')}}" alt="">
													<div class="notice-content">
														<div>Siêu sale điện thoại bùng nổ, rinh ngay kẻo lỡ</div>
														<div class="notice-date">20:10:2022</div>
													</div>
												</a></li>
											</ul>
										</span>
									</div>
									<a href="#" class="header-blog">
										<i class="fa-solid fa-blog"></i>
										Tin tức
									</a>
									<div href="#" class="header-blog show-weather" style="cursor: pointer">
										<i class="fa-solid fa-cloud-sun"></i>
										Thời tiết
									</div>
									<div class="modal-weather night">
										<div class="weather" id="weather"> 
											<input type="text" class="search" placeholder="search...">
											<div class="content">
												<h1 class="capital">
													<span class="city">Ha Noi</span>
													<span>,</span>
													<span class="country">VN</span>
												</h1>
												<div class="datetime">
													25/04/2022, 3:25:16 PM
												</div>
												<div class="temperature">
													<span>
														<span class="value">23</span>
														<sup>o</sup>C
													</span>
												</div>
												<div class="short-desc">
													Clouds
												</div>
												<div class="desc">
													Clouds description
												</div>
												<div class="more-desc">
													<div class="visibility">
														<i class="fas fa-eye"></i>
														<span>1000 (m)</span>
													</div>
													<div class="wind">
														<i class="fas fa-wind"></i>
														<span>10.5 (m/s)</span>
													</div>
													<div class="sun">
														<i class="fas fa-cloud-sun"></i>
														<span>10 (%)</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="dayNight activeNight pull-right">
							<span class="day-icon day-icon-day"><i class="fa-solid fa-sun"></i></span>
							<span class="day-icon day-icon-night active-dayNight"><i class="fa-solid fa-moon"></i></span>
						</div>
					</div>
				</div><!--/header-bottom-->
			</div>
		</header><!--/header-->
		
		<section id="slider">
			<div class="home-banner container">
				<div class="row">
					<div class="col-sm-12">
						{{-- Main-banner --}}
						<div id="slider-carousel" class="carousel slide col-sm-9" data-ride="carousel">
							<ol class="carousel-indicators" style="bottom: 40px">
								<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#slider-carousel" data-slide-to="1"></li>
								<li data-target="#slider-carousel" data-slide-to="2"></li>
							</ol>
							
							<div class="carousel-inner main-slider">
								<div class="item active">
									<a href="">
										<img src="https://cdn.tgdd.vn/2022/04/banner/A73-830-300-830x300.png" alt="">
									</a>
								</div>
								<div class="item">
									<a href="">
										<img src="{{asset('public/front-end/images/home/slider-banner1.png')}}" alt="">
									</a>
								</div>
								<div class="item">
									<a href="">
										<img src="{{asset('public/front-end/images/home/slider-banner2.png')}}" alt="">
									</a>
								</div>
								
								
							</div>
						   
							<div class="control-carousel-hidden">
								<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
									<i class="fa fa-angle-left" style="box-shadow: 4px 3px #ccc;"></i>
								</a>
								<a href="#slider-carousel" class="right control-carousel hidden-xs" style="right: 15px" data-slide="next">
									<i class="fa fa-angle-right" style="box-shadow: -4px 3px #ccc;"></i>
								</a>
							</div>
				
							<div class="min-banner">
								<img src="{{asset('public/upload/banner/banner-min1.PNG')}}" alt="">
							</div>
						</div>
				
						{{-- Slider-sale --}}
						<div id="slider-carousel2" class="carousel slide col-sm-3" data-ride="carousel">
							<ol class="carousel-indicators" style="bottom: 62px">
								<li data-target="#slider-carousel2" data-slide-to="0" class="active"></li>
								<li data-target="#slider-carousel2" data-slide-to="1"></li>
								<li data-target="#slider-carousel2" data-slide-to="2"></li>
							</ol>
							
							<div class="carousel-inner mini-slider">
								<div class="item active">
									<a href="">
										<img src="https://cdn.tgdd.vn/2022/03/banner/laptopdesk-222-340x340.jpg" alt="" />
									</a>
								</div>
								<div class="item">
									<a href="">
										<img src="https://cdn.tgdd.vn/2022/03/banner/laptopdesk1111111-340x340.jpg" alt="" />
									</a>
								</div>
								<div class="item">
									<a href="">
										<img src="https://cdn.tgdd.vn/2022/03/banner/macbooksticky-340x340.jpg" alt="" />
									</a>
								</div>
								
							</div>
							<ul class="code-coupon-fee">
								<li>Mã khuyến mãi</li>
								<li>Mã free ship</li>
								<li>Mã 0 đồng</li>
							</ul>
						</div>
						
					</div>
				
				</div>
			</div>
		</section>


		<div class="banner_qc" style="position: fixed; top:180px; left:4px; cursor:pointer; z-index:999"><img style="width: 80%" src="https://cdn.tgdd.vn/2022/05/banner/Trai-79x271-5.png" alt=""></div>
		{{-- <div class="icon-share" style="position: fixed; top:120px; right:0">
			<ul class="icon-mxh">
				<li><a href="" class="icon-facebook"><i class="fab fa-facebook"></i></a></li>
				<li><a href="" class="icon-instagram"><i class="fab fa-instagram-square"></i></a></li>
				<li><a href="" class="icon-youtube"><i class="fab fa-youtube"></i></a></li>
				<li><a href="" class="icon-tiktok"><i class="fab fa-tiktok"></i></a></li>
				<li><a href="" class="icon-google"><i class="fab fa-google"></i></a></li>
				<li><a href="" class="icon-telegram"><i class="fab fa-telegram"></i></a></li>
				
			</ul>
		</div> --}}

		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-2" style="padding: 10px">
						<div class="left-sidebar">
						
							<div class="panel-group category-products" id="accordian"><!--category-productsr-->
								<p class="sidebar-title">
									<i class="fas fa-list"></i>
									<span>Tất Cả Danh Mục</span>
								</p>
								@foreach ($category as $item => $cate)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
									</div>
								</div>
								@endforeach
								<div class="see-more text-center">
									<a href="">Xem Thêm<i class="fa-solid fa-chevron-down"></i></a>
								</div>
							</div><!--/category-products-->
						
							<div class="brands_products"><!--brands_products-->
								<p class="sidebar-title">
									<span id="brand-sidebar"><i class="fa fa-dove fa-spin"></i> THƯƠNG HIỆU</span>
								</p>
								{{-- @foreach ($brand as $item => $brand) --}}
								<div class="brands-name">
									<ul class="nav nav-pills nav-stacked">
										<li><a href="{{URL::to('/thuong-hieu-san-pham/2')}}">
											<img src="{{asset('public/front-end/images/home/samsung-brand.png')}}" alt="">	
										</a></li>
										<li><a href="{{URL::to('/thuong-hieu-san-pham/6')}}">
											<img src="{{asset('public/front-end/images/home/OPPO-brand.jpg')}}" alt="">	
										</a></li>
										<li><a href="{{URL::to('/thuong-hieu-san-pham/10')}}">
											<img src="{{asset('public/front-end/images/home/dell-brand.png')}}" alt="">	
										</a></li>
										<li><a href="{{URL::to('/thuong-hieu-san-pham/11')}}">
											<img src="{{asset('public/front-end/images/home/hp-brand.png')}}" alt="">	
										</a></li>
										<li><a href="{{URL::to('/thuong-hieu-san-pham/12')}}">
											<img src="{{asset('public/front-end/images/home/asus-brand.png')}}" alt="">	
										</a></li>
									</ul>
								</div>
								{{-- @endforeach --}}
							</div><!--/brands_products-->
							
							<div class="price-range"><!--price-range-->
								<p><i class="fa-solid fa-filter"></i>BỘ LỌC</p>
								<div class="well text-center">
									<form action="{{URL::to('/filter-price')}}" method="GET" style="font-size:18px">
										<input type="text" id="amount" readonly style="border:0; color:#f6931f; width:100%;margin-bottom:10px">
										<input type="hidden" name="start_price" id="start-price" value="3">
										<input type="hidden" name="end_price" id="end-price" value="20">
										<div id="slider-range"></div>
										<input type="submit" id="price-filter" value="OK" class="btn btn-warning" style="position: relative;top:5px">
									</form>
								</div>

								<div class="sort-amount">
									<p>Sắp xếp theo</p>
									<form action="{{URL::to('/sort-product')}}" method="POST">
										@csrf
										<select name="sort_by" id="sort" class="form-control">
											<option value="tang_dan">Giá tăng dần</option>
											<option value="giam_dan">Giá giảm dần</option>
											<option value="kytu_az">Tên từ A-Z</option>
											<option value="kytu_za">Tên từ Z-A</option>
										</select>
										<input type="submit" class="btn btn-default" value="LỌC">
									</form>
								</div>
							</div><!--/price-range-->
						
						</div>
					</div>
					
					<div class="col-sm-10 padding-right" id="main-product">
						@yield('content')
					</div>
				</div>
			</div>
		</section>
		
		<footer id="footer"><!--Footer-->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="companyinfo">
								<h2><span>e</span>-shopper</h2>
								<p>Dev-Kool mang đến sự tin tưởng, chất lượng cho khách hàng</p>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="https://cdn.tgdd.vn/2021/10/banner/appleDT-390x210-1.png" alt="" />
										</div>
									
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="https://cdn.tgdd.vn/2022/05/banner/Yoga-GamingLaptop-copy-390x210.png" alt="" />
										</div>
									
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="https://cdn.tgdd.vn/2022/05/banner/samsung-390-210-390x210.png" alt="" />
										</div>
								
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="https://cdn.tgdd.vn/2022/04/banner/sport380x2002x-760x400-1.png" alt="" />
										</div>
									
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="address">
								<img src="images/home/map.png" alt="" />
								<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="footer-widget">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Service</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Online Help</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Order Status</a></li>
									<li><a href="#">Change Location</a></li>
									<li><a href="#">FAQ’s</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Quock Shop</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">T-Shirt</a></li>
									<li><a href="#">Mens</a></li>
									<li><a href="#">Womens</a></li>
									<li><a href="#">Gift Cards</a></li>
									<li><a href="#">Shoes</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>Policies</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Terms of Use</a></li>
									<li><a href="#">Privecy Policy</a></li>
									<li><a href="#">Refund Policy</a></li>
									<li><a href="#">Billing System</a></li>
									<li><a href="#">Ticket System</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="single-widget">
								<h2>About Shopper</h2>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#">Company Information</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Store Location</a></li>
									<li><a href="#">Affillate Program</a></li>
									<li><a href="#">Copyright</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-sm-offset-1">
							<div class="single-widget">
								<h2>About Shopper</h2>
								<form action="#" class="searchform">
									<input type="text" placeholder="Your email address" />
									<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
									<p>Get the most recent updates from <br />our site and be updated your self...</p>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
						<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
					</div>
				</div>
			</div>
			
		</footer><!--/Footer-->
	</div>
	

  
    <script src="{{asset('public/front-end/js/jquery.js')}}"></script>
	<script src="{{asset('public/front-end/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/all.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/front-end/js/price-range.js')}}"></script>
    <script src="{{asset('public/front-end/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/front-end/js/main.js')}}"></script>
    <script src="{{asset('public/front-end/js/sweetalert.js')}}"></script>
    <script src="{{asset('public/front-end/js/weather.js')}}"></script>
    <script src="{{asset('public/front-end/js/validator.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


	{{-- <div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Chào bạn!" data-autopopup="10" data-width="" data-height=""></div>
	<script src="https://sp.zalo.me/plugins/sdk.js"></script> --}}

<script>
	const signinBtn = document.querySelector('.signinBtn')
	const signupBtn = document.querySelector('.signupBtn')
	const formBx = document.querySelector('.formBx');
	const check_login = document.querySelector('.check-login')

	signupBtn.onclick = function() {
		formBx.classList.add('active')
		check_login.classList.add('active')
	}
	signinBtn.onclick = function() {
		formBx.classList.remove('active')
		check_login.classList.remove('active')
	}
</script>


<script type="text/javascript">
	//-----Comment-------//
	$(document).ready(function(){

		var product_id = $('.comment_product_id').val();
		var _token = $('input[name="_token"]').val();

		$.ajax({
			url: '{{url('/load-comment')}}',
			method: 'POST',
			data:{product_id:product_id, _token:_token},
			success:function(data){
				$('#comment_show').html(data);
			}
		});

		//Đánh giá
		function remove_background(product_id){
			for(var count = 1; count <= 5 ; count++){
				$('#'+product_id+'-'+count).css('color','#ccc');
			}
		}
	
		//hover đánh giá sao
		$(document).on('mouseenter','.rating',function(){
			var index = $(this).data('index');
			var product_id = $(this).data('product_id');
			remove_background(product_id);
			for (let count = 1; count <= index; count++) {
				$('#'+product_id+'-'+count).css('color','#ffcc00');
				
			}
		});

		$('.rating').click(function(){
			var index = $(this).data('index');
			var product_id = $(this).data('product_id');
			var _token = $('input[name="_token"]').val();

			$.ajax({
			url: '{{url('/insert-rating')}}',
			method: 'POST',
			data:{index:index,product_id:product_id, _token:_token},
			success:function(data){
				if(data == 'done'){
					swal('Đánh giá thành công');
				}else{
					swal('Lỗi đánh giá');
				}
			}
		});
		})
	})
</script>

{{-- Filter Price --}}
<script>
	$( function() {
		$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 50,
		values: [ 3, 20 ],
		slide: function( event, ui ) {
			$( "#amount" ).val("Từ " + ui.values[ 0 ] + " - " + ui.values[ 1 ] + " triệu ");
			$( "#start-price" ).val(ui.values[ 0 ]);
			$( "#end-price" ).val(ui.values[ 1 ]);
		}
		});
		$( "#amount" ).val("Từ " +  $("#slider-range" ).slider( "values", 0 ) + " - " + $( "#slider-range" ).slider( "values", 1 ) + " triệu ");
	} );
</script>

<script type="text/javascript">
    $('#keywords').keyup(function(){
        var keywords = $(this).val();
        
        if(keywords != ''){
            // alert(keywords);
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url("/search-ajax")}}",
                method: "POST",
                data:{keywords:keywords,_token:_token},
                success:function(data){
                    // alert(data);
                    $('#search-ajax').fadeIn();
                    $('#search-ajax').html(data);
                }
            });
        }else{
            $('#search-ajax').fadeOut();
        }
    });
</script>

<script>
	$('#submit_comment').click(function(){
		var product_id = $('.comment_product_id').val();
		// var customer_name = $('.customer_name').val();
		var add_comment = $('.add_comment').val();
		var _token = $('input[name="_token"]').val();
	
		$.ajax({
			url: '{{url('/add-comment')}}',
			method: 'POST',
			data:{product_id:product_id,add_comment:add_comment, _token:_token},
			success:function(data){
				location.reload();
			}
		});
	});
//-----Comment-------//
</script>
<script type="text/javascript">
	//$(document).ready(function(){
	
		// $(document).on('mouseleave','.rating',function(){
		// 	var index = $(this).data('index');
		// 	var product_id = $(this).data('product_id');
		// 	var rating = $(this).data('rating');
		// 	remove_background(product_id);
		// 	for (let count = 1; count <= rating; count++) {
		// 		$('#'+product_id+'-'+count).css('color','#ffcc00');
				
		// 	}
		// });

	//});
//-----Comment-------//
</script>

<script>
	//-----Modal Weather-----//
	$('.show-weather').click(function(){
		$('.modal-weather').addClass('show-modal');
	});
	$('.modal-weather').click(function(e){
		if(e.target == e.currentTarget){
			$(this).removeClass('show-modal');
		}
	});

</script>

<script>
	//----DayNight----//
	$('.day-icon-night').click(function(){
		$('.day-icon-night').removeClass('active-dayNight');
		$('.day-icon-day').addClass('active-dayNight');
		$('.app-shopping').addClass('app-container');
		$('.category-products').addClass('category-products-dark');
	});
	$('.day-icon-day').click(function(){
		$('.day-icon-day').removeClass('active-dayNight');
		$('.day-icon-night').addClass('active-dayNight');
		$('.app-shopping').removeClass('app-container');
		$('.category-products').removeClass('category-products-dark');
	});

</script>

<script>
	//-----Modal SignIn-----//
	$('.link-login-customer').click(function(){
		$('.modal-sign').addClass('show-sign');
	});
	$('#btn-close-login').click(function(){
		$('.modal-sign').removeClass('show-sign');
	});
	$('.modal-sign').click(function(e){
		if(e.target == e.currentTarget){
			$(this).removeClass('show-sign');
		}
	});

</script>

<script type="text/javascript">
	$('.btn-signin').click(function(){
		var customer_email = $('#user-email').val();
		var customer_password = $('#user-password').val();
		var _token = $('input[name="_token"]').val();

		$.ajax({
			url: '{{url('/login-customer')}}',
			method: 'POST',
			data:{customer_email:customer_email, customer_password:customer_password, _token:_token},
			success:function(data){
				if(data == 'success'){
					location.reload();
				}
				else{
					$('.box-message').addClass('show-error-message');
				}
			}
		});
	})
</script>

<script>
	//-----Ordered-----//
	$('#show-ordered').click(function(){
		$('.box-ordered').addClass('show-box-ordered');
		$('#show-ordered').css('display','none');
		$('#hide-ordered').css('display','inline-block');
	});
	$('#hide-ordered').click(function(){
		$('.box-ordered').removeClass('show-box-ordered');
		$('#show-ordered').css('display','inline-block');
		$('#hide-ordered').css('display','none');
	});

</script>

<script>
	// mục tiêu 
	Validator({
		form: '.signupForm',
		errorSelector: '.form-message',
		rules: [
			Validator.isRequired('#new-user-name'),
			Validator.isRequired('#new-user-email'),
			Validator.isEmail('#new-user-email'),
			Validator.isRequired('#new-user-password'),
			Validator.isMinLength('#new-user-password', 5),
			Validator.isRequired('#new-user-tel'),
			Validator.isRequired('#confirm-user-password'),
			Validator.isConfirmed('#confirm-user-password', () => {
				return document.querySelector('.signupForm #new-user-password').value
			}, 'Mật khẩu nhập lại không trùng khớp')
		]
		// onSubmit(data) {
		// 	// call API để tạo dữ liệu
		// 	console.log(data)
		// }
	})

	Validator({
		form: '.signinForm',
		errorSelector: '.form-message',
		rules: [
			Validator.isRequired('#user-email', "Bạn chưa nhập vào Email"),

			Validator.isRequired('#user-password', "Bạn chưa nhập vào mật khẩu"),
		]
		// onSubmit(data) {
		// 	// call API để tạo dữ liệu
		// 	console.log(data)
		// }
	})
</script>

	<script type="text/javascript">
		$(document).ready(function(){
//Test account
			$('.check-account').click(function(){
				swal("Bạn chưa đăng nhập!", "Vui lòng đăng nhập để xem hồ sơ!", "warning");
			})		
			$('#check-cart').click(function(){
				swal({
                                title: "Bạn chưa đăng nhập!",
                                text: "Vui lòng đăng nhập để sử dụng chức năng giỏ hàng",
                                showCancelButton: true,
                                cancelButtonText: "OK",
                                confirmButtonClass: "btn-warning",
                                confirmButtonText: "Đăng nhập ngay",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/login-checkout')}}";
                            });
			})	
//Thêm giỏ hàng
			$('.add-to-cart').click(function(){	
				var login = $('.login-success').val();
				if(login == 0){
					$('.modal-sign').addClass('show-sign');				
				}else{
					var id = $(this).data('id_product');
					var check_product_qty = $('.check_product_qty_' +  id).val();
					var cart_product_id = $('.cart_product_id_' +  id).val();
					var cart_product_name = $('.cart_product_name_' +  id).val();
					var cart_product_image= $('.cart_product_image_' +  id).val();
					var cart_product_desc= $('.cart_product_desc_' +  id).val();
					var cart_product_price = $('.cart_product_price_' +  id).val();
					var cart_product_qty = $('.cart_product_qty_' +  id).val();
					var _token = $('input[name="_token"]').val();
					// alert(cart_product_desc);
					if(check_product_qty < cart_product_qty){
						swal("Sản phẩm tạm hết hàng!");
					}else{
	
						$.ajax({
							url: '{{url('/add-cart-ajax')}}',
							method: 'POST',
							data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_desc:cart_product_desc,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
							success:function(){
								swal({
										title: "Đã thêm sản phẩm vào giỏ hàng",
										text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
										showCancelButton: true,
										cancelButtonText: "Xem tiếp",
										confirmButtonClass: "btn-success",
										confirmButtonText: "Đi đến giỏ hàng",
										closeOnConfirm: false
									},
									function() {
										window.location.href = "{{url('/gio-hang')}}";
									});
		
							}
						});
					}
				}

			});
//Phí vận chuyển
			$('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action == 'city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url: '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action, ma_id:ma_id, _token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
		});
	</script>
	<script>
		$('.calculate_delivery').click(function (){
			var matp = $('.city').val(); 
			var maqh = $('.province').val(); 
			var xaid = $('.wards').val(); 
            var _token = $('input[name="_token"]').val();
			if(matp=='' || maqh=='' || xaid==''){
				swal("Chưa chọn nới giao hàng!", "Vui lòng chọn nơi giao hàng", "warning");
			}else{

				$.ajax({
					url: '{{url('calculate-fee')}}',
					method: 'POST',
					data:{matp:matp, maqh:maqh, xaid:xaid, _token:_token},
					success:function(data){
						location.reload();
					}
				});
			}
		});
	</script>

		<!-- Messenger Plugin chat Code -->
		<div id="fb-root"></div>

		<!-- Your Plugin chat code -->
		<div id="fb-customer-chat" class="fb-customerchat">
		</div>
	
		<script>
		  var chatbox = document.getElementById('fb-customer-chat');
		  chatbox.setAttribute("page_id", "107846608420391");
		  chatbox.setAttribute("attribution", "biz_inbox");
		</script>
	
		<!-- Your SDK code -->
		<script>
		  window.fbAsyncInit = function() {
			FB.init({
			  xfbml            : true,
			  version          : 'v13.0'
			});
		  };
	
		  (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));
		</script>
</body>
</html>