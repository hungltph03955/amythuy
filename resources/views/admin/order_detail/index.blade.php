@extends('templates.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Order Detail List
                    </div>
                    {{--<form action="{{route('order-detail.index')}}" method="get" class="form-inline">--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control" name="s" placeholder="keyword" value="{{isset($s) ? $s : ''}}">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<button class="btn btn-primary" type="submit">Search</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                    <div class="box-body">

                        <table class="table table-bordered table-hover dataTable">
                            <tr>
                                <th>Id</th>
                                <th>Order Detail</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                {{--<th>Action</th>--}}
                            </tr>
                            @foreach ($orderDetails as $detail)
                                <tr>
                                    <td>{{ $detail->id }}</td>
                                    <td><a href="order/{{$detail->order_id}}/edit">{{ $detail->order->id }}</a></td>
                                    <td><a href="product/{{$detail->product_id}}/edit">{{ $detail->product->name }}</a></td>
                                    <td>{{ $detail->quantity}}</td>
                                    <td>{{ $detail->total}}</td>
                                    {{--<td href="{!! action('Admin\CustomerController@show', $order->id) !!}" class="btn btn-primary">Show</td>--}}
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
