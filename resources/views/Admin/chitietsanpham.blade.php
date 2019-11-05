@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Chi tiết sản phẩm</h2>
<form class="form-horizontal" action="{{route('suasp',$product->id)}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="tensanpham" value="{{$product->name}}">
    </div>
  </div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Loại danh mục</label>
		<div class="col-sm-10">
			<div class="input-group">
			<select class="form-control" id="inputGroupSelect03">
				<option selected>{{$type->name}}</option>
				@foreach($types as $value)
				<option value="{{$value->name}}">{{$value->name}}</option>
				@endforeach
			</select>
			</div>
		</div>
	</div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">giá</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" name="gia" value="{{$product->unit_price}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Description</label>
    <div class="col-sm-10">
        <textarea name="mieuta" id="input" class="form-control" rows="3" required="required">{{$product->description}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">image</label>
    <div class="col-sm-10">
        <textarea name="mieuta" id="input" class="form-control" rows="3" required="required"></textarea>
    </div>
  </div>
  <!-- <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Hình ảnh</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" value="">
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-warning">Sửa</button>
      <a class="btn btn-danger" href="">Xóa</a>
    </div>
  </div>
</form>

@endsection