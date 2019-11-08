@extends('master_admin')
@section('content')
<h2 style="margin-bottom:30px;">Danh sách hóa đơn</h2>
<!-- <a style="margin-bottom:10px;" class="btn btn-success" href="">Thêm hoá đơn</a> -->
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">ID hóa đơn</th>
            <th style="text-align:center;">Khách hàng</th>
            <th style="text-align:center;">Tổng tiền</th>
            <th style="text-align:center;">Phương thức thanh toán</th>
            <th style="text-align:center;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bills as $bill)
        <tr>
            <td style="text-align:center;">{{$bill->id}}</td>
            <td style="width:30%;text-align:center;">{{$bill->id_customer}}</td>
            <td style="width:15%; text-align:center;">{{number_format($bill->total)}}</td>
            <td style="width:25%; text-align:center;">
            @if($bill->payment == "COD")
            Thanh toán trực tiếp
            @else
            Thanh toán bằng thẻ tín dụng
            @endif
            </td>
            <td style="text-align:center;">
                <a class="btn btn-success" href="{{route('chitietHD', $bill->id)}}">Chi tiết</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection