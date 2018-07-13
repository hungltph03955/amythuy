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
                            @if(isset($arrayProductOrderHaveName))
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
                            @endif
                            </tbody>
                        </table>
                    </div>


                    <div class="box-body">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Tổng số lương sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Chuyển đổi trạng thái đơn hàng</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $orderDetails->quantity }} Sản phẩm</td>
                                <td>{{MONEY}} {{ $orderDetails->total }} </td>
                                <td>{{  $order->customer->name  ?  $order->customer->name : ''  }}</td>
                                <td>{{ $order->customer->phone_number ? $order->customer->phone_number : '' }}</td>
                                <td>{{ $order->customer->email ? $order->customer->email : '' }}
                                    <a style="margin-left: 20px" class="btn btn-primary"
                                       href="mailto:{{$order->customer->email}}">Send Email</a>
                                </td>
                                <th>
                                    @if($order->order_status === 0)
                                        <span class="label label-danger">{{ 'Đơn hàng mới' }}</span>
                                    @elseif($order->order_status === 1)
                                        <span class="label label-warning">{{ 'Đơn hàng đang được giao' }}</span>
                                    @elseif($order->order_status === 2)
                                        <span class="label label-success">{{ 'Đơn hàng đã được giao' }}</span>
                                    @elseif($order->order_status === 3)
                                        <span class="label label-default">{{ 'Đơn hàng đã hủy' }}</span>
                                    @elseif($order->order_status === 4)
                                        <span class="label label-default">{{ 'Hết hàng' }}</span>
                                    @endif
                                </th>
                                <th>
                                    @foreach($arraStatusOrder as $arraStatusOrderItem)
                                        @if($arraStatusOrderItem != $order->order_status)
                                            @if($arraStatusOrderItem === 0)
                                                <a href="{!! action('Admin\OrderController@changeStatus', [$order->id,$arraStatusOrderItem]) !!}"
                                                   class="label label-danger"
                                                   onclick="return ConfirmDelete()">{{ 'Đơn hàng mới' }}</a>
                                            @elseif($arraStatusOrderItem === 1)
                                                <a href="{!! action('Admin\OrderController@changeStatus', [$order->id,$arraStatusOrderItem]) !!}"
                                                   class="label label-warning"
                                                   onclick="return ConfirmDelete()">{{ 'Đơn hàng đang được giao' }}</a>
                                            @elseif($arraStatusOrderItem === 2)
                                                <a href="{!! action('Admin\OrderController@changeStatus', [$order->id,$arraStatusOrderItem]) !!}"
                                                   class="label label-success"
                                                   onclick="return ConfirmDelete()">{{ 'Đơn hàng đã được giao' }}</a>
                                            @elseif($arraStatusOrderItem === 3)
                                                <a href="{!! action('Admin\OrderController@changeStatus', [$order->id,$arraStatusOrderItem]) !!}"
                                                   class="label label-default"
                                                   onclick="return ConfirmDelete()">{{ 'Đơn hàng đã hủy' }}</a>
                                            @elseif($arraStatusOrderItem === 4)
                                                <a href="{!! action('Admin\OrderController@changeStatus', [$order->id,$arraStatusOrderItem]) !!}"
                                                   class="label label-default"
                                                   onclick="return ConfirmDelete()">{{ 'Hết hàng' }}</a>
                                            @endif
                                        @endif
                                    @endforeach
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có chắc chắc muốn chuyển đổi đơn hàng này?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
