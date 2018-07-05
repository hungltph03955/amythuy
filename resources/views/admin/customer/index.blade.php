@extends('templates.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Customer List
                    </div>
                    <form action="{{route('customer.index')}}" method="get" class="form-inline">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email}}</td>
                                    <td>
                                        <a href="{!! action('Admin\CustomerController@show', $customer->id) !!}" class="btn btn-primary">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            {!! $customers->appends(['search' => $search])->links() !!}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
