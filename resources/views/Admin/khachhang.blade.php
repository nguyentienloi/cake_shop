@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Khach hang</h2>
<a style="margin-bottom:10px;" class="btn btn-success" href="">Thêm khach hang</a>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">ID</th>
            <th style="text-align:center;">Name</th>
            <th style="text-align:center;">Email</th>
            <th style="text-align:center;">Dia chi</th>
            <th style="text-align:center;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td style="text-align:center;">{{$customer->id}}</td>
            <td style="width:15%;">{{$customer->name}}</td>
            <td style="width:10%;">{{$customer->email}}</td>
            <td style="width:35%;">{{$customer->address}}</td>
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