<div class="box-body">
    <table class="table table-bordered table-hover dataTable">
        <thead>
        <tr>
            <th>Thứ tự</th>
            <th>Tên khách hàng</th>
            <th>Mã đơn hàng</th>
            <th>Trạng thái</th>
            <th>Ngày đặt hàng</th>
            <th>Tổng tiền</th>
            <th>Mô tả</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach ($orderNew as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->order_code}}</td>
                <td>
                    @if($order->order_status === 0)
                        <span class="label label-info">{{ 'Đơn hàng mới' }}</span>
                    @elseif($order->order_status === 1)
                        <span class="label label-warning">{{ 'Đơn hàng đang giao' }}</span>
                    @elseif($order->order_status === 2)
                        <span class="label label-success">{{ 'Đơn hàng đã được giao' }}</span>
                    @elseif($order->order_status === 3)
                        <span class="label label-danger">{{ 'Đơn hàng đã hủy' }}</span>
                    @elseif($order->order_status === 4)
                        <span class="label label-dismissible">{{ 'Hết hàng' }}</span>
                    @endif
                </td>
                <td>{{ $orderDate = date("d-m-Y", strtotime($order->updated_at)) }}</td>
                <td>{{MONEY}} {{ $order->total }}</td>
                <td>{{$order->cancel_description}}</td>
                <td>
                    <a href="{!! action('Admin\OrderDetailController@show', $order->id) !!}"
                       class="btn btn-primary">Show</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
