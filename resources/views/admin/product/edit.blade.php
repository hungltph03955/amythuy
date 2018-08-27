@extends('layouts.admin.master')
@section('content')
    <section class="content-header">
        <h1>Chỉnh sửa sản phẩm
            <small>(Chỉnh Sửa)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li class="active"><a href="#">Chỉnh sửa</a></li>
        </ol>
        <p></p>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="POST" action="{{action('Admin\ProductController@update', $product->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="color-fixpading">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Chỉnh sửa</h3>
                            </div>
                            <div class="box-body table-responsive">
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm :</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{!! old('name',isset($product->name) ? $product->name : null) !!}">
                                    @if ($errors->has('name'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="code">Mã sản phẩm *</label>
                                    <input id="code" type="text" class="form-control" name="code"
                                           value="{{ old('code', isset($product->code) ? $product->code : null) }}">
                                    @if ($errors->has('code'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('code') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Chọn danh mục *</label>
                                    <select class="form-control" id="select-multi-category" name="category_id[]" multiple="multiple">
                                        <?php menuMultiSelectBox($categories, 0, $str = "---|", $categoryCurrent) ?>
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả sản phẩm:</label>
                                    <textarea name="description" id="editor1" rows="10" cols="80">
                                        {!! old('description',isset($product->description) ? $product->description : null) !!}
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                {{--<div class="form-group">--}}
                                {{--<label for="exampleInputEmail1">Số lượng :</label>--}}
                                {{--<input id="quantity" type="text" class="form-control" name="quantity"--}}
                                {{--value="{!! old('quantity',isset($product->quantity) ? $product->quantity : null) !!}">--}}
                                {{--@if ($errors->has('quantity'))--}}
                                {{--<span class="help-block categoryAdd">--}}
                                {{--<strong>{{ $errors->first('quantity') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trị giá :</label>
                                    <input id="price" type="text" class="form-control" name="price"
                                        value="{!! old('price',isset($product->price) ? $product->price : null) !!}">
                                    @if ($errors->has('price'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh đại diện sản phẩm :</label>
                                    <input type="file" id="exampleInputFile" name="imageMater"
                                        onchange="readURLimageMater(this);">
                                    <div class="imageMaterShowFoloat">
                                        @if(file_exists( public_path().PATH_IMAGE_MASTER. $product->img))
                                            <img id="imageMaterShow" class="imageMaterShowEdit"
                                                src="{{PATH_IMAGE_MASTER. $product->img}}">
                                        @else
                                            <img id="imageMaterShow" class="imageMaterShowEdit" src="{{PATH_NO_IMAGE}}">
                                        @endif
                                    </div>
                                    <p class="help-block">(Ảnh đại diện cho sản phẩm)</p>
                                    @if ($errors->has('imageMater'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('imageMater') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái sản phẩm :</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios1" value="0"
                                                    {{ $product->status == 0 ?  'checked="checked"' : ''}}>
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios2"
                                                value="1" {{ $product->status == 1 ?  'checked="checked"' : ''}}>
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Sửa ảnh chi tiết sp-->
                    <div class="color-fixpading">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Các ảnh chi tiết hiện có của sản phẩm</h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body">
                                    <div class="form-group image-detail-element">
                                        @if(isset($imageDetail))
                                            @if(isset($imageDetail[0]))
                                                @foreach($imageDetail as $key => $imageDetailValuee)
                                                    <div class="imageDetail" id="{{ $key }}">
                                                        <img src="{{PATH_IMAGE_DETAIL. $imageDetailValuee->name}}"
                                                             idHinh="{!! $imageDetailValuee->id !!}" id="{!! $key !!}">
                                                        <a href="javascript:void(0)"
                                                           id="del_img_demo"
                                                           class="btn btn-danger  imageDetailDeledit">
                                                            Xóa ảnh
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p style="color: red">Chưa có ảnh chi tiết</p>
                                            @endif
                                        @endif
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-header">
                                <h3 class="box-title">Thêm ảnh chi tiết sản phẩm</h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body">
                                    <div class="form-group image-detail-element">
                                        <label for="exampleInputFile">Ảnh chi tiết sản phẩm</label>
                                        <input type="file" id="exampleInputFile" name="imageDetail[]"
                                               onchange="readURL(this);">
                                        <div class="imgaefloat"><img id="blah" src=""/></div>

                                        <p class="help-block">(Ảnh chi tiết cho sản phẩm)</p>
                                        <div class="btn btn-danger  imageDetailDel">X</div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="btn btn-primary imageDetail-clone">Thêm ảnh chi tiết</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Sửa màu sắc sp-->
                    <div class="color-fixpading">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Màu sắc hiện có của sản phẩm : </h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body">
                                    <div class="form-group color-element">
                                        @if(!empty($colorCurrent))
                                            @foreach($colorCurrent as $key => $colorCurrentValuee)
                                                <div class="imageDetail" id="{!! 'colorImageDetail'.$key !!}">
                                                    <img src="{{PATH_IMAGE_COLOR. $colorCurrentValuee->img}}"
                                                         idHinh="{!! $colorCurrentValuee->id !!}" id="{!! $key !!}">
                                                    <div class="colorDetail">
                                                        <span>{{ $colorCurrentValuee->colors_name  }}</span></div>
                                                    <a href="javascript:void(0)" id="del_color_demo"
                                                       class="btn btn-danger  imageColor">Xóa
                                                        ảnh và màu sắc</a>
                                                </div>
                                            @endforeach
                                        @endif
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-header">
                                <h3 class="box-title">Thêm màu sắc</h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body">

                                    <div class="form-group color-element">
                                        <select name='color_id[]' class="form-control color_id">
                                            <option value="0">chưa có màu sắc</option>
                                            @if(isset($color))
                                                @foreach ($color as $itemColor)
                                                    <option value="{{ $itemColor['id'] }}">{{ $itemColor['name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="imageColor">
                                            <input type="file" id="exampleInputFile" name="imageColor[]"
                                                   onchange="readImageColorURL(this);">

                                            <div class="imageColor"><img id="blah" src=""/></div>
                                        </div>
                                        <div class="btn btn-danger  color-x">X</div>
                                        <p></p>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <div class="btn btn-primary color-clone">Thêm màu sắc</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Sửa kích cỡ sp-->
                    <div class="color-fixpading">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Thêm kích cỡ</h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body">
                                    @if(!empty($sizeCurrent) && isset($sizeCurrent[0]))
                                        @foreach($sizeCurrent as $key => $sizeCurrentValues)
                                            <div class="form-group size-element">
                                                <select name="size_id[]" class="form-control size_id">
                                                    <option value="0">chưa có kích cỡ</option>
                                                    @if(isset($size))
                                                        @foreach ($size as $itemSize)
                                                            <option value="{{ $itemSize['id'] }}" {{ $sizeCurrentValues->size_id==$itemSize['id'] ? 'selected' : '' }}>{{ $itemSize['name'] }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="btn btn-danger  size-x">X</div>
                                                <p></p>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group size-element">
                                            <select name="size_id[]" class="form-control size_id">
                                                <option value="0">chưa có kích cỡ</option>
                                                @if(isset($size))
                                                    @foreach ($size as $itemSize)
                                                        <option value="{{ $itemSize['id'] }}">{{ $itemSize['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="btn btn-danger  size-x">X</div>
                                            <p></p>
                                        </div>
                                    @endif
                                </div>
                                <div class="box-footer">
                                    <div class="btn btn-primary size-clone">Thêm kích cỡ</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Sửa chất liệu sp-->
                    <div class="color-fixpading">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Thêm chất liệu</h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body">
                                    @if(!empty($materialCurrent) && isset($materialCurrent[0]))
                                        @foreach($materialCurrent as $key => $materialCurrentValues)
                                            <div class="form-group material-element">
                                                <select name="material_id[]" class="form-control material_id">
                                                    <option value="0">chưa có chất liệu</option>
                                                    @if(isset($material))
                                                        @foreach ($material as $itemMaterial)
                                                            <option value="{{ $itemMaterial['id'] }}" {{ $materialCurrentValues->material_id==$itemMaterial['id'] ? 'selected' : '' }}>{{ $itemMaterial['name'] }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="btn btn-danger  material-x">X</div>
                                                <p></p>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group material-element">
                                            <select name="material_id[]" class="form-control material_id">
                                                <option value="0">chưa có chất liệu</option>
                                                @if(isset($material))
                                                    @foreach ($material as $itemMaterial)
                                                        <option value="{{ $itemMaterial['id'] }}">{{ $itemMaterial['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="btn btn-danger  material-x">X</div>
                                            <p></p>
                                        </div>
                                    @endif
                                </div>
                                <div class="box-footer">
                                    <div class="btn btn-primary material-clone">Thêm chất liệu</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Sửa bộ sưu tập sp-->
                    <div class="color-fixpading">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Thuộc bộ sưu tập</h3>
                            </div>
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body">
                                    @if(!empty($collectionCurrent) && isset($collectionCurrent[0]))
                                        @foreach($collectionCurrent as $key => $collectionCurrentValues)
                                            <div class="form-group collection-element">
                                                <select name="collection_id[]" class="form-control collection_id">
                                                    <option value="0">chưa có bộ sưu tập</option>
                                                    @if(isset($collection))
                                                        @foreach ($collection as $itemCollection)
                                                            <option value="{{ $itemCollection['id'] }}" {{ $collectionCurrentValues->collection_id==$itemCollection['id'] ? 'selected' : '' }}>{{ $itemCollection['name'] }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="btn btn-danger  collection-x">X</div>
                                                <p></p>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group collection-element">
                                            <select name="collection_id[]" class="form-control collection_id">
                                                <option value="0">chưa có bộ sưu tập</option>
                                                @if(isset($collection))
                                                    @foreach ($collection as $itemCollection)
                                                        <option value="{{ $itemCollection['id'] }}">{{ $itemCollection['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <div class="btn btn-danger  collection-x">X</div>
                                            <p></p>
                                        </div>
                                    @endif
                                </div>
                                <div class="box-footer">
                                    <div class="btn btn-primary collection-clone">Thêm bộ sưu tập</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Button submit-->
                    <div class="color-fixpading">
                        <div class="box box-danger">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-danger">Sửa sản phẩm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
