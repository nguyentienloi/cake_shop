@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Thêm khách hàng</h2>
<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif</div>
<form class="form-horizontal" action="{{route('themkhachhang')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Tên khách hàng</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="tenkhachhang" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Giới tính</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="gt" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="" name="email" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Số điện thoại</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="image" value="" name="phone">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Địa chỉ</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="" value="" name="address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Ghi chú</label>
    <div class="col-sm-10">
    <textarea name="note" id="input" class="form-control" rows="3" required="required"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Thêm khách hàng</button>
    </div>
  </div>
</form>
@endsection