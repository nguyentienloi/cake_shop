@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Danh sách sản phẩm</h2>
<a style="margin-bottom:10px;" class="btn btn-success" href="{{route('addsanpham')}}">Thêm sản phẩm</a>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">STT</th>
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">Giá</th>
            <th style="text-align:center;">Description</th>
            <th style="text-align:center;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
            <tr data-href="www.facebook.com">
                <td style="text-align:center;">{{$product->id}}</td>
                <td style="width:20%;">{{$product->name}}</td>
                <td style="width:10%;">{{number_format($product->unit_price)}}</td>
                <td style="width:45%;">{{$product->description}}</td>
            <td style="text-align:center;">
                <a class="btn btn-success" href="{{route('chitietSP',$product->id)}}">Chi tiết</a>
            </td>
            </tr>
    @endforeach
    </tbody>
</table>
<div class="col-sm-6 col-sm-offset-4">{{ $products->links() }}</div>
@endsection