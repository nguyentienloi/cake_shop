@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Thêm danh mục</h2>
<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif</div>
<form class="form-horizontal" action="{{route('themdanhmuc')}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="tendanhmuc" value="">
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
      <button type="submit" class="btn btn-success">Thêm danh mục</button>
    </div>
  </div>
</form>
@endsection