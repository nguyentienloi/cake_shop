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
	</style>
</head>
<body>
	<div class="container">
		<h2 style="text-align:center;margin-bottom:30px;margin-top:15px;">Quản trị website cake_shop</h2>
		<div class="row">
			<div class="col-md-2">
				<ul id="admin_menu">
					<li><a href="{{route('admin/sanpham')}}">Sản phẩm</a>
					<li><a href="">Danh mục</a>
					<li><a href="">Khách hàng</a>
					<li><a href="">Hóa đơn</a>
					<li><a href="">User</a>
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
