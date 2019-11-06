<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel </title>
    <base href="{{ asset('') }}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	<style>
	#admin_menu {

	}
	#admin_menu li {
		list-style-type:none;
		padding:12px;
	}
	#admin_menu li:hover{
		background-color:#ccc;
		border-right:1px solid #ccc;
	}
	#top li {
		list-style-type:none;
		float:left;
	}
	</style>
</head>
<body>
	<div class="container">
	<div class="row" style="padding-bottom:50px;padding-top:20px;">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
		<h2 style="text-align:center;margin-bottom:30px;margin-top:15px;"><img src="source/assets/dest/images/logo-cake.png" width="100px" alt="">Quản trị website cake_shop</h2>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<ul id="top">
			</ul>
		</div>
	</div>
		<div class="row">
			<div class="col-md-2">
				<ul id="admin_menu">
					<li><b><a href="{{route('sanpham')}}">Sản phẩm</a></b>
					<li><b><a href="{{route('danhmuc')}}">Danh mục</a></b>
					<li><b><a href="{{route('khachhang')}}">Khách hàng</a></b>
					<li><b><a href="{{route('hoadon')}}">Hóa đơn</a></b>
					<li><b><a href="{{route('user')}}">User</a></b>
				</ul>
			</div>
			<div class="col-md-10">
			@yield('content')
			</div>
		</div>
	</div>
	<!-- include js files -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="source/assets/dest/js/custom2.js"></script>
</body>
</html>
