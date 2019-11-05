@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Chi tiết sản phẩm</h2>
<form class="form-horizontal" action="/action_page.php">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Tên</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" value="{{$product->name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Loại danh mục</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" value="{{$type->name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">giá</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" value="{{$product->unit_price}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Description</label>
    <div class="col-sm-10">
        <textarea name="" id="input" class="form-control" rows="3" required="required">{{$product->description}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Hình ảnh</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" value="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-11 col-sm-1">
      <button type="submit" class="btn btn-warning">Sửa</button>
    </div>
  </div>
</form>

@endsection