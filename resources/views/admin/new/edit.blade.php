@extends('layouts.admin.master')
@section('content')

    <section class="content-header content-child">
        <h1>Chỉnh sửa tin tức
            <small>(Chỉnh sửa)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Chỉnh Sửa tin tức</a></li>
            <li class="active"><a href="#">Chỉnh sửa</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form role="form" method="POST"
                              action="{{action('Admin\NewController@postNewsEdit', $newsDetail->id)}}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề bài viết:</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{   old('name',isset($newsDetail->name) ? $newsDetail->name : null) }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chi tiết bài viết:</label>
                                    <textarea name="description" id="editor1" rows="10" cols="80">
                                     {!! old('description',isset($newsDetail->description) ? $newsDetail->description : null) !!}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh đại diện sản phẩm :</label>
                                    <input type="file" id="exampleInputFile" name="imageNews"
                                           onchange="readURLimageMater(this);">
                                    <div class="imageMaterShowFoloat">
                                        @if(file_exists( public_path().PATH_IMAGE_NEWS. $newsDetail->img))
                                            <img id="imageMaterShow" class="imageNewsEdit"
                                                 src="{{PATH_IMAGE_NEWS. $newsDetail->img}}">
                                        @else
                                            <img id="imageMaterShow" class="imageNewsEdit" src="{{PATH_NO_IMAGE}}">
                                        @endif
                                        <img id="imageMaterShow" src=""/>
                                    </div>
                                    <p class="help-block">(Ảnh đại diện cho sản phẩm)</p>
                                    @if ($errors->has('imageNews'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('imageNews') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios1"
                                                   value="0" {{ $newsDetail->status == 0 ?  'checked="checked"' : ''}}>
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios2"
                                                   value="1" {{ $newsDetail->status == 1 ?  'checked="checked"' : ''}}>
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Sửa Tin tức</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection