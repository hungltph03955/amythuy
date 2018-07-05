@extends('templates.master')
@section('content')
    <section class="content-header content-child">
        <h1>Chỉnh Sửa danh mục sản phẩm
            <small>(Chỉnh sửa)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Chỉnh Sửa danh mục sản phẩm</a></li>
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
                    <div class="box-body table-responsive no-padding">
                        <form role="form" method="POST" enctype="multipart/form-data"
                              action="{{action('Admin\CategoryController@update', $category->id)}}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Danh mục lớn:</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="0">--- Danh mục gốc ---</option>
                                        <?php menuMulti($parent, 0, $str = "---|", $data["parent_id"]) ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh mục:</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{!! old('name',isset($data["name"]) ? $data["name"] : null) !!}"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh đại diện sản phẩm :</label>
                                    <input type="file" id="exampleInputFile" name="imageCategory"
                                           onchange="readURLimageCategory(this);">
                                    <div class="imageMaterShowFoloat">
                                        @if(file_exists( public_path().PATH_IMAGE_CATEGORY. $data['img']))
                                            <img id="imageCategoryShow" class="imageCategoryEdit"
                                                 src="{{PATH_IMAGE_CATEGORY. $data['img']}}">
                                        @else
                                            <img id="imageCategoryShow" class="imageCategoryEdit"
                                                 src="{{PATH_NO_IMAGE}}">
                                        @endif
                                    </div>
                                    <p class="help-block">(Ảnh đại diện cho sản phẩm)</p>
                                    @if ($errors->has('imageCategory'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('imageCategory') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input id="description" type="text" class="form-control" name="description"
                                           value="{!! old('description',isset($data["description"]) ? $data["description"] : null) !!}"
                                           required autofocus>
                                    @if ($errors->has('description'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif


                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios1" value="0"
                                                    {{ $data["status"] == 0 ?  'checked="checked"' : ''}}
                                            >
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios2"
                                                   value="1" {{ $data["status"] == 1 ?  'checked="checked"' : ''}}>
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection