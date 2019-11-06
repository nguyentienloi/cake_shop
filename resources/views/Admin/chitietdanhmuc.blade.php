@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Chi tiết danh mục</h2>
<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif</div>
<form class="form-horizontal" action="{{route('editdanhmuc',$type->id)}}" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="" name="tendanhmuc" value="{{$type->name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Description</label>
    <div class="col-sm-10">
        <textarea name="mieuta" id="input" class="form-control" rows="3" required="required">{{$type->description}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">image</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="image" value="{{$type->image}}" name="image">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-warning">Sửa</button>
      <a class="btn btn-danger" href="{{route('deletedanhmuc', $type->id)}}">Xóa</a>
    </div>
  </div>
</form>
@endsection