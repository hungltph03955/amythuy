@extends('layouts.admin.master')
@section('content')
    <section class="content-header content-child">
        <h1>Thêm mới banner
            <small>(Thêm mới)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Thêm mới banner</a></li>
            <li class="active"><a href="#">Thêm mới</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form role="form" method="POST" action="{{action('Admin\ImagebannerController@store')}}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề banner:</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh baner : </label>
                                    <input type="file" id="exampleInputFile" name="imageBanner"
                                           onchange="readURLimageBanner(this);">
                                    <div class="imageMaterShowFoloat"><img id="imageBanner" src=""/></div>
                                    <p class="help-block">(Ảnh đại diện cho sản phẩm)</p>
                                    @if ($errors->has('imageBanner'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('imageBanner') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios1" value="0"
                                                   checked="">
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios2"
                                                   value="1">
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm ảnh banner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>









    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading"> Create New Image</div>--}}
    {{--<div class="panel-body">--}}
    {{--<form class="form-horizontal" method="POST"--}}
    {{--action="{{action('Admin\ImagebannerController@store')}}"--}}
    {{--enctype="multipart/form-data">--}}
    {{--{{ csrf_field() }}--}}
    {{--<div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">--}}
    {{--<label for="banner" class="col-md-4 control-label">Banner Name</label>--}}
    {{--<div class="col-md-6">--}}
    {{--<input id="banner" type="text" class="form-control" name="banner"--}}
    {{--value="{{ old('banner') }}" required autofocus>--}}
    {{--@if ($errors->has('banner'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('banner') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">--}}
    {{--<label for="price" class="col-md-4 control-label">Price </label>--}}
    {{--<div class="col-md-6">--}}
    {{--<input id="price" type="text" class="form-control" name="price"--}}
    {{--value="{{ old('price') }}" required autofocus>--}}
    {{--@if ($errors->has('price'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('price') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">--}}
    {{--<label for="description" class="col-md-4 control-label">Description</label>--}}
    {{--<div class="col-md-6">--}}
    {{--<input id="description" type="text" class="form-control" name="description"--}}
    {{--value="{{ old('description') }}" required autofocus>--}}
    {{--@if ($errors->has('description'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('description') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
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
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}



@endsection