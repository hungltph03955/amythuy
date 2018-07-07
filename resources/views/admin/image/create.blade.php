{{--@extends('layouts.admin.master')--}}

{{--@section('content')--}}
    {{--@extends('error')--}}

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading"> Create New Image </div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<form class="form-horizontal" method="POST" action="{{action('Admin\ImageController@store')}}" enctype="multipart/form-data">--}}
                            {{--{{ csrf_field() }}--}}




                            {{--<div class="form-group">--}}
                                {{--<label for="product_id" class="col-md-4 control-label">Product</label>--}}
                                {{--<br>--}}
                                {{--<div class="col-md-6">--}}

                                {{--<select id="product_id" class="selectpicker form-control col-md-6 "  name="product_id" data-live-search="true" title="Please select a country ...">--}}
                                    {{--@foreach ($products as $product)--}}
                                        {{--<option value="{{ $product->id }}"--}}
                                                {{--{{ $product->id==$id ? 'selected' : '' }}>{{$product->name}}</option>--}}
                                    {{--@endforeach--}}

                                {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}



                                {{--<input type="file" name="img">--}}
                                {{--<div class="form-group">--}}
                                    {{--<div class="col-md-6 col-md-offset-4">--}}
                                        {{--<button type="submit" class="btn btn-primary" value="upload">--}}
                                            {{--Submit--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}




                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--@endsection--}}
@extends('layouts.admin.master')
@section('content')

        <!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 5.5 - multiple images uploading using dropzone js</title>

    <link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">

    <script src="http://demo.expertphp.in/js/dropzone.js"></script>

</head>

<body>

    <div class="form-group">
    <label for="product_id" class="col-md-4 control-label">Product</label>
    <br>
        <div class="col-md-6">

            <select id="product_id" class="selectpicker form-control col-md-6 "  name="product_id" data-live-search="true" disabled>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        {{ $product->id==$id ? 'selected' : '' }}>{{$product->name}}</option>
                @endforeach

            </select>
        </div>
    </div>
<br/>
<h3>Laravel 5.5 - multiple images uploading using dropzone js</h3>
<br/>




{!! Form::open([ 'route' => [ 'image.upload',$id ], 'files' => true, 'class' => 'dropzone','id'=>"image-upload"]) !!}

{!! Form::close() !!}



</body>

<script type="text/javascript">

    Dropzone.options.imageUpload = {

        maxFilesize  : 1,

        acceptedFiles: ".jpeg,.jpg,.png,.gif"

    };

</script>

</html>
@endsection