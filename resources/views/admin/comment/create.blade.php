@extends('templates.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Create New Comment </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{action('Admin\CommentController@store')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}




                            <div class="form-group">
                                <label for="product_id" class="col-md-4 control-label">Product</label>
                                <br>
                                <select id="product_id" class="selectpicker col-md-6 "  name="product_id" data-live-search="true" title="Please select a country ...">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                                {{ $product->id==$comment->product_id ? 'selected' : '' }}>{{$product->name}}</option>
                                    @endforeach

                                </select>
                            </div>



                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">Content</label>

                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control" name="content" required autofocus>

                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" value="upload">
                                        Submit
                                    </button>
                                </div>
                            </div>
                    </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
    </div>

@endsection