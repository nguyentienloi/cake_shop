@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Danh muc</h2>
<a style="margin-bottom:10px;" class="btn btn-success" href="">Thêm danh mục</a>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">STT</th>
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">Description</th>
            <th style="text-align:center;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($type_products as $type_product)
        <tr>
            <td style="text-align:center;">{{$type_product->id}}</td>
            <td style="width:20%;">{{$type_product->name}}</td>
            <td style="width:45%;">{{$type_product->description}}</td>
            <td style="text-align:center;">
                <a class="btn btn-success" href="">Chi tiết</a>
                <a class="btn btn-primary" href="">Sửa</a>
                <a class="btn btn-danger" href="">Xóa</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection