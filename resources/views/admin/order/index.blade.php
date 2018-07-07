@extends('layouts.admin.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Order List
                    </div>
                    <form action="{{route('order.index')}}" method="get" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="keyword" value="{{isset($s) ? $s : ''}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                    <div class="box-body">

                        <table class="table table-bordered table-hover dataTable">
                            <tr>
                                <th>Id</th>
                                <th>Customer Name</th>
                                <th>Order Detail</th>
                                <th>Total</th>
                                <th>Delivered</th>
                                <th>Cancel</th>
                                <th>Cancel Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->order_no}}</td>
                                    <td>{{ $order->total}}</td>
                                    <?php
                                        if($order->is_delivered == 0){
                                    ?>
                                    <td>No</td>
                                    <?php }else{ ?>
                                    <td>Yes</td>
                                    <?php } ?>

                                    <?php
                                    if($order->is_cancel == 0){
                                    ?>
                                    <td>No</td>
                                    <?php }else{ ?>
                                    <td>Yes</td>
                                    <?php } ?>
                                    <td>{{$order->cancel_description}}</td>
                                    <td href="{!! action('Admin\CustomerController@show', $order->id) !!}" class="btn btn-primary">Show</td>
                                </tr>
                            @endforeach
                            {!! $orders->appends(['search' => $search])->links() !!}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
