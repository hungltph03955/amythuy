@extends('layouts.admin.master')
@section('content')
    @extends('error')
    <section class="content-header content-child">
        <h1> Chi tiết đơn hàng
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">chi tiết đơn hàng</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Phụ lục</th>
                                <th>Hình ảnh</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arrayProductOrderHaveName as $arrayProductOrderItem)
                                <tr>
                                    <td>{{ $arrayProductOrderItem['name']}} </td>
                                    <td>{{MONEY}} {{number_format($arrayProductOrderItem['price'])}} </td>
                                    <td>{{ $arrayProductOrderItem['qty']}} </td>
                                    <td>{{MONEY}} {{number_format($arrayProductOrderItem['subtotal'])}} </td>
                                    <td>
                                        Size
                                        : {{ $arrayProductOrderItem['options']['sizeName'] ? $arrayProductOrderItem['options']['sizeName'] : null  }}
                                        <br>
                                        Color
                                        : {{ $arrayProductOrderItem['options']['colorName'] ? $arrayProductOrderItem['options']['colorName'] : null  }}
                                        <br>
                                        Material
                                        : {{ $arrayProductOrderItem['options']['materialName'] ? $arrayProductOrderItem['options']['materialName'] : null  }}
                                    </td>
                                    <td class="imageProductTd">
                                        <div class="imageProduct">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $arrayProductOrderItem['options']['image']))
                                                <img src="{{PATH_IMAGE_MASTER. $arrayProductOrderItem['options']['image']}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 col-md-offset-0">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">--}}
    {{--Order Detail List--}}
    {{--</div>--}}
    {{--<form action="{{route('order-detail.index')}}" method="get" class="form-inline">--}}
    {{--<div class="form-group">--}}
    {{--<input type="text" class="form-control" name="s" placeholder="keyword" value="{{isset($s) ? $s : ''}}">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<button class="btn btn-primary" type="submit">Search</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--<div class="box-body">--}}

    {{--<table class="table table-bordered table-hover dataTable">--}}
    {{--<tr>--}}
    {{--<th>Id</th>--}}
    {{--<th>Order Detail</th>--}}
    {{--<th>Product</th>--}}
    {{--<th>Quantity</th>--}}
    {{--<th>Total</th>--}}
    {{--<th>Action</th>--}}
    {{--</tr>--}}
    {{--@foreach ($orderDetails as $detail)--}}
    {{--<tr>--}}
    {{--<td>{{ $detail->id }}</td>--}}
    {{--<td><a href="order/{{$detail->order_id}}/edit">{{ $detail->order->id }}</a></td>--}}
    {{--<td><a href="product/{{$detail->product_id}}/edit">{{ $detail->product->name }}</a>--}}
    {{--</td>--}}
    {{--<td>{{ $detail->quantity}}</td>--}}
    {{--<td>{{ $detail->total}}</td>--}}
    {{--<td href="{!! action('Admin\CustomerController@show', $order->id) !!}" class="btn btn-primary">Show</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection
