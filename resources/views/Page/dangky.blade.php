@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if(count($errors)>0)
			<div class="alert alert-danger">
			@foreach($errors->all() as $err)
			{{err}}
			@endforeach
			</div>
			@endif
			<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif</div>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h2 style="text-align: center;">Đăng kí thành viên</h2>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Mail</label>
							<input type="email" id="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Họ và tên</label>
							<input type="text" id="your_last_name" name="fullname" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ</label>
							<input type="text" id="adress" name="address" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu</label>
							<input type="text" id="phone" name="pass" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu</label>
							<input type="text" id="phone" name="repass" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection