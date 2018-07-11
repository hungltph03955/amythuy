@extends('layouts.admin.master')
@section('content')
    @extends('error')

    <section class="content-header content-child">
        <h1> Danh đơn hàng
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Danh sách đơn hàng</a></li>
            <li class="active"><a href="#">Danh sách</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách</h3>
                    </div>
                    <div class="box-body">
                        <a class="btn btn-success" href="{{ action('Admin\ProductController@create') }}">
                            thêm mới đo</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên khách hàng</th>
                                <th>Mã đơn hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Thông tin</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->order_code}}</td>
                                    <td>
                                        @if($order->order_status === 0)
                                            <span class="label label-danger">{{ 'Đơn hàng mới' }}</span>
                                        @elseif($order->order_status === 1)
                                            {{ 'Đơn hàng đang giao' }}
                                        @elseif($order->order_status === 2)
                                            {{ 'Đơn hàng đã được giao' }}
                                        @elseif($order->order_status === 3)
                                            {{ 'Đơn hàng đã hủy' }}
                                        @elseif($order->order_status === 4)
                                            {{ 'Hết hàng' }}
                                        @endif
                                    </td>
                                    <td>{{ $order->total}}</td>
                                    <td>{{$order->cancel_description}}</td>
                                    <td href="{!! action('Admin\CustomerController@show', $order->id) !!}"
                                        class="btn btn-primary">Show
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="productPagin">
                            {!! $orders->appends(['search' => $search])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có chắc chắc muốn xóa đơn hàng này?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection



