@extends('master_admin')
@section('content')
<div class="row">
    <div class="col-md-5"><h2 style="margin-bottom:30px;">Chi tiết hoá đơn</h2></div>
    <div class="col-md-5"></div>
    <div class="col-md-2"><a href="{{route('pdf', $bill->id)}}" class="btn btn-primary">In hóa đơn</a></div>
</div>
<div class="row" style="margin-bottom:20px;">
    <div class="col-md-3"><p>Khách hàng: {{$customer->name}}</p></div>
    <div class="col-md-6"></div>
    <div class="col-md-3"><p style="float:right;">Ngày lập:{{$bill->created_at}}</p></div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;">Sản phẩm</th>
            <th style="text-align:center;">Số lượng</th>
            <th style="text-align:center;">Giá tiền</th>
            <th style="text-align:center;">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bill_detail as $v)
        <tr>
            <td style="text-align:center;">{{$v->product->name}}</td>
            <td style="width:15%;text-align:center;">{{$v->quantity}}</td>
            <td style="width:15%; text-align:center;">{{number_format($v->unit_price)}}</td>
            <td style="width:25%; text-align:center;">{{number_format($v->quantity * $v->unit_price)}}</td>
        </tr>
    @endforeach
    <tr height="30px">
			<td colspan="3">
            <p style="text-align:center;"><b>Tổng tiền</b></p>
			</td>
            <td style="text-align:center;">
            <b>{{number_format($bill->total)}}đ</b>
			</td>
		</tr>
    </tbody>
</table>

@endsection