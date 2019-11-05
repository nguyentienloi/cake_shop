@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			<a href="index.html">Home</a> / <span>Contacts</span>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.9108884941415!2d105.8074787149291!3d20.99620889426472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac96f4018c13%3A0x8369a3b0cad52636!2zMzI4IE5ndXnhu4VuIFRyw6NpLCBUaGFuaCBYdcOibiBUcnVuZywgVGhhbmggWHXDom4sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1572971871774!5m2!1svi!2s" ></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Form liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<p>Mọi thắc mắc xin liên hệ về địa chỉ mail của cửa hàng để được giải đáp mọi thắc mắc</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên...">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Mail...">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Tiêu đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Nội dung..."></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Gửi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Số 116,ngõ 328 đường Nguyễn Trãi,<br>
						Thanh Xuân Trung, Phường Thanh Xuân <br>
						Hà Nội
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Tiệm bánh cake_shop</h6>
					<p>
						Chuỗi cửa hàng chải dài các tỉnh thành, <br>
						với 23 cơ sở <br>
						<a href="mailto:nguyentienloi160997@gmail.com">nguyentienloi160997@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Nhân viên</h6>
					<p>
						Chúng tôi luôn luôn mang đến những chiếc bánh <br>
						ngon nhất đến khách hàng. <br>
						<a href="nguyentienloi160997@gmail.com">nguyentienloi160997@gmail.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection