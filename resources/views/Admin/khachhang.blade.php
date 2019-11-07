@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Khach hang</h2>
<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif</div>
<a style="margin-bottom:10px;" class="btn btn-success" href="{{route('themkhachhang')}}">Thêm khách hàng</a>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">ID</th>
            <th style="text-align:center;">Tên khách hàng</th>
            <th style="text-align:center;">Email</th>
            <th style="text-align:center;">Số điện thoại</th>
            <th style="text-align:center;">Địa chỉ</th>
            <th style="text-align:center;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td style="text-align:center;">{{$customer->id}}</td>
            <td style="width:15%;">{{$customer->name}}</td>
            <td style="width:10%;">{{$customer->email}}</td>
            <td>{{$customer->phone_number}}</td>
            <td style="width:35%;">{{$customer->address}}</td>
            <td style="text-align:center;">
                <a class="btn btn-success" href="{{route('chitietkhachhang',$customer->id)}}">Chi tiết</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="col-sm-6 col-sm-offset-4">{{ $customers->links() }}</div>
@endsection