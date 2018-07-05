@extends('templates.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Product List
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-hover dataTable">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($images as $image)
                                <tr>
                                    <td>{{ $image->id }}</td>
                                    <td><img width="100"src="{{asset($image->name)}}"></td>
                                    <td><a href="product/{{$image->product_id}}/edit">{{$image->product->name}}</a></td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['image.destroy', $image->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\ImageController@destroy',$image->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            {!! $images->links() !!}
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
