@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <a href="{{ route('trangchu') }}">Home</a> / <span>Loại sản phẩm</span> / <span>{{ $loaisanpham->name }}</span>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        <li><h3>Danh mục</h3></li>
                        @foreach($loai as $l)
                        <li><a href="{{ route('loaisanpham', $l->id) }}">{{ $l->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản phẩm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{ count($sp_theoloai) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($sp_theoloai as $sp)
                            <div class="col-sm-4" style="margin-bottom:30px;">
                                <div class="single-item">
                                    @if($sp->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham', $sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" style="height:230px;"></a>
                                    </div>
                                    <div class="single-item-body" style="margin-bottom:15px;">
                                        <p class="single-item-title"><b>{{$sp->name}}</b></p>
                                        <p class="single-item-price">
                                            @if($sp->promotion_price == 0)
                                                <span class="flash-sale">{{ number_format($sp->unit_price) }}đ</span>
                                            @else
                                                <span class="flash-del">{{ number_format($sp->unit_price) }}đ</span>
                                                <span class="flash-sale">{{ number_format($sp->promotion_price) }}đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('addtocart', $sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham', $sp->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <!-- <p class="pull-left">Tìm thấy {{ count($sp_khac) }} sản phẩm</p> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($sp_khac as $sp_k)
                            <div class="col-sm-4" style="margin-bottom:30px;">
                                <div class="single-item">
                                    @if($sp_k->promotion_price)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham', $sp_k->id)}}"><img src="source/image/product/{{$sp_k->image}}" alt="" style="height:230px;"></a>
                                    </div>
                                    <div class="single-item-body" style="margin-bottom:15px;">
                                        <p class="single-item-title"><b>{{$sp_k->name}}</b></p>
                                        <p class="single-item-price">
                                            @if($sp_k->promotion_price == 0)
                                                <span class="flash-sale">{{ number_format($sp_k->unit_price) }}đ</span>
                                            @else
                                                <span class="flash-del">{{ number_format($sp_k->unit_price) }}đ</span>
                                                <span class="flash-sale">{{ number_format($sp_k->promotion_price) }}đ</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('addtocart', $sp_k->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham', $sp_k->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection