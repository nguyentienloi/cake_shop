@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Danh sách hóa đơn</h2>
<a style="margin-bottom:10px;" class="btn btn-success" href="">Thêm hoá đơn</a>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">ID hóa đơn</th>
            <th style="text-align:center;">Khách hàng</th>
            <th style="text-align:center;">Số lượng</th>
            <th style="text-align:center;">Tổng tiền</th>
            <th style="text-align:center;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        <tr>
            <td style="text-align:center;">{{$bill->id}}</td>
            <td style="width:15%;">{{$bill->id_customer}}</td>
            <td style="width:10%;">1</td>
            <td style="width:35%;">{{$bill->total}}</td>
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