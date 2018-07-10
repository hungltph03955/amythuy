@extends('layouts.admin.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="btn btn-success" href="{{ action('Admin\SaleController@create',1)}}"> Tạo sản phầm Sale </a>
                    </div>
                    <div class="box-body">
                        <form action="{{route('sale.index')}}" method="get" class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="keyword" value="{{isset($s) ? $s : ''}}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover dataTable">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Product</th>
                                <th>Sale price</th>
                                <th>Description</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->name}}</td>
                                    <td><a href="product/{{$sale->product_id}}/edit">{{$sale->product->name}}</a></td>
                                    <td>{{ $sale->sale_price}}</td>
                                    <td>{{ $sale->description}}</td>
                                    <td>{{ $sale->start_date}}</td>
                                    <td>{{ $sale->end_date}}</td>
                                    <td>
                                        <a href="{!! action('Admin\SaleController@edit', $sale->id) !!}" class="btn btn-primary">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['sale.destroy', $sale->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\SaleController@destroy',$sale->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        {{--                                        <a href="{!! action('ShopController@destroy', $shop->id) !!}" class="btn btn-danger btn-sm">Delete</a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            {!! $sales->appends(['search' => $search]) !!}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
