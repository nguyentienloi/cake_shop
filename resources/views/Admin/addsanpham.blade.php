@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Thêm sản phẩm</h2>
<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif</div>
<form class="form-horizontal" action="{{route('addsanpham')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="tensanpham" value="">
    </div>
  </div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Loại danh mục</label>
		<div class="col-sm-10">
			<div class="input-group">
			<select class="form-control" id="inputGroupSelect03" name="loaisanpham">
				<option value="1">Bánh mặn</option>
				<option value="2">Bánh ngọt</option>
				<option value="3">Bánh trái cây</option>
				<option value="4">Bánh kem</option>
				<option value="5">Bánh crepe</option>
				<option value="6">Bánh pizza</option>
			</select>
			</div>
		</div>
	</div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">giá</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" name="gia" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Description</label>
    <div class="col-sm-10">
        <textarea name="mieuta" id="input" class="form-control" rows="3" required="required"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">image</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="image" value="" name="image">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
    </div>
  </div>
</form>
@endsection