@extends('layouts.admin.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Show Customer</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST"
                              action="{{action('Admin\ProductController@show', $product->id)}} "
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">
                                <label for="category_code" class="col-md-4 control-label">Category</label>
                                <br>
                                <div class="col-md-6">

                                    <select id="category_id" class="selectpicker form-control col-md-6 "
                                            name="category_id" data-live-search="true" disabled>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    {{ $category->id==$product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_code" class="col-md-4 control-label">Product code</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="product_code" name="product_code"
                                           value="{{$product->product_code}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="serial" class="col-md-4 control-label">Serial</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="serial" name="serial" value="{{$product->serial}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail" class="col-md-4 control-label">Detail</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="detail" name="detail" value="{{$product->detail}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="description" name="description"
                                           value="{{$product->description}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="import_date" class="col-md-4 control-label">Import date</label>

                                <div class="col-md-6">
                                    <input type="date" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="import_date" name="import_date"
                                           value="{{$product->import_date}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="col-md-4 control-label">Quantity</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="quantity" name="quantity" value="{{$product->quantity}}"
                                           disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-md-4 control-label">Price</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="price" name="price" value="{{$product->price}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="views" class="col-md-4 control-label">Views</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="views" name="views" value="{{$product->views}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="buys" class="col-md-4 control-label">Buys</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="buys" name="buys" value="{{$product->buys}}" disabled>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="buys" class="col-md-4 control-label">Rating</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput"
                                           placeholder="{{$rating}}" name="rating" value="{{$rating}}" disabled>

                                </div>
                            </div>

                            <img width="200" src="{{asset($product->img)}}">

                        </form>
                        <a href="{!! action('Admin\ProductController@edit', $product->id) !!}" class="btn btn-primary ">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id],'style'=>'display:inline']) !!}
                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\ProductController@destroy',$product->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-pull-0">
                <a class="btn btn-success" href="{{ action('Admin\ImageController@create',$product->id) }}"> Create </a>
            </div>

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
                            @foreach ($product->photo as $image)
                                <tr>
                                    <td>{{ $image->id }}</td>
                                    <td><img width="100" src="{{asset($image->name)}}"></td>
                                    <td><a href="product/{{$image->product_id}}/edit">{{$image->product->name}}</a></td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['image.destroy', $image->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\ImageController@destroy',$image->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            {{--                        {!! $product->photo->links() !!}--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-success" href="{{ action('Admin\CommentController@create') }}"> Create </a>
            </div>
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Comment List
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover dataTable">
                            <tr>
                                <th>Id</th>
                                <th>Customer</th>
                                <th>Admin</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($product->comment as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <?php
                                    if(empty($comment->customer->name))
                                    {
                                    ?>
                                    <td> N/A</td>
                                    <?php }else{ ?>

                                    <td>{{ $comment->customer->name}}</td>
                                    <?php } ?>
                                    <?php
                                    if(empty($comment->admin->name))
                                    {
                                    ?>
                                    <td>N/A</td>
                                    <?php
                                    }else{
                                    ?>
                                    <td>{{$comment->admin->name}}</td>
                                    <?php } ?>
                                    <td>{{ $comment->content}}</td>
                                    <td>{{ $comment->created_at}}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['comment.destroy', $comment->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\CommentController@destroy',$comment->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>

            function ConfirmDelete() {
                var x = confirm("Are you sure you want to delete?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
    </div>

@endsection