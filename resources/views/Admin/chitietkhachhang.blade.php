@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Chi tiết khách hàng</h2>
<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif</div>
<form class="form-horizontal" action="{{route('updatekhachhang', $customer->id)}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Tên khách hàng</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="tenkhachhang" value="{{$customer->name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Giới tính</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="gt" value="{{$customer->gender}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="" name="email" value="{{$customer->email}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Số điện thoại</label>
    <div class="col-sm-10">
    <input type="number" class="form-control" id="image" value="{{$customer->phone_number}}" name="phone">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Địa chỉ</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="" value="{{$customer->address}}" name="address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Ghi chú</label>
    <div class="col-sm-10">
    <textarea name="note" id="input" class="form-control" rows="3" required="required">{{$customer->note}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Sửa</button>
      <a class="btn btn-danger" href="">Xóa</a>
    </div>
  </div>
</form>
@endsection