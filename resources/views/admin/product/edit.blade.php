@extends('templates.master')
@section('content')
    <section class="content-header content-child">
        <h1>Chỉnh sửa sản phẩm phẩm
            <small>(Chinh Sản)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Chinh sửa sản phẩm phẩm</a></li>
            <li class="active"><a href="#">Chinh sửa</a></li>
        </ol>
        <p></p>
    </section>

    <section class="content">
        <div class="row">
            <form role="form" method="POST" action="{{action('Admin\ProductController@update', $product->id)}}"
                  enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Chỉnh sửa</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm :</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{!! old('name',isset($product->name) ? $product->name : null) !!}">
                                    @if ($errors->has('name'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Danh mục lớn:</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    {{ $category->id==$product->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
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

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng :</label>
                                    <input id="quantity" type="text" class="form-control" name="quantity"
                                           value="{!! old('quantity',isset($product->quantity) ? $product->quantity : null) !!}">
                                    @if ($errors->has('quantity'))
                                        <span class="help-block categoryAdd">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>

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
                    <div class="col-md-12 color-fixpading">
                        <div class="box box-danger">
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
                    <div class="col-md-12 color-fixpading">
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
                    <div class="col-md-12 color-fixpading">
                        <div class="box box-success">
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
                    <div class="col-md-12 color-fixpading">
                        <div class="box box-info">
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
                    <div class="col-md-12 color-fixpading">
                        <div class="box box-warning">
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
                    <div class="col-md-12 color-fixpading">
                        <div class="box box-danger">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        </div>
    </section>
@endsection



{{--<section class="content">--}}
{{--<div class="row">--}}
{{--<div class="box box-primary ">--}}
{{--<div class="box-header with-border">--}}
{{--<h3 class="box-title"><strong>Edit New Product</strong></h3>--}}
{{--</div>--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-8 col-md-offset-2">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading"> Edit Product</div>--}}
{{--<div class="panel-body">--}}
{{--<form class="form-horizontal" method="POST"--}}
{{--action="{{action('Admin\ProductController@update', $product->id)}} "--}}
{{--enctype="multipart/form-data">--}}
{{--{{ csrf_field() }}--}}
{{--<input name="_method" type="hidden" value="PATCH">--}}

{{--<div class="col-lg-pull-0">--}}
{{--<a class="btn btn-success"--}}
{{--href="{{ action('Admin\ImageController@create',$product->id) }}"> Create--}}
{{--New Image</a>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="name" class="col-md-4 control-label">Name</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="name" name="name"--}}
{{--value="{{$product->name}}">--}}

{{--</div>--}}
{{--</div>--}}


{{--<div class="form-group">--}}
{{--<label for="category_code" class="col-md-4 control-label">Category</label>--}}
{{--<br>--}}
{{--<div class="col-md-6">--}}

{{--<select id="category_id" class="selectpicker form-control col-md-6 "--}}
{{--name="category_id" data-live-search="true">--}}
{{--@foreach ($categories as $category)--}}
{{--<option value="{{ $category->id }}"--}}
{{--{{ $category->id==$product->category_id ? 'selected' : '' }}>{{$category->name}}</option>--}}
{{--@endforeach--}}

{{--</select>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="product_code" class="col-md-4 control-label">Product--}}
{{--code</label>--}}
{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="product_code" name="product_code"--}}
{{--value="{{$product->product_code}}">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="serial" class="col-md-4 control-label">Serial</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="serial" name="serial"--}}
{{--value="{{$product->serial}}">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="detail" class="col-md-4 control-label">Detail</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="detail" name="detail"--}}
{{--value="{{$product->detail}}">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="description" class="col-md-4 control-label">Description</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="description"--}}
{{--name="description" value="{{$product->description}}">--}}

{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="import_date" class="col-md-4 control-label">Import date</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="date" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="import_date"--}}
{{--name="import_date" value="{{$product->import_date}}">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="quantity" class="col-md-4 control-label">Quantity</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="quantity" name="quantity"--}}
{{--value="{{$product->quantity}}">--}}

{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="price" class="col-md-4 control-label">Price</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="price" name="price"--}}
{{--value="{{$product->price}}">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="views" class="col-md-4 control-label">Views</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="views" name="views"--}}
{{--value="{{$product->views}}">--}}

{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="buys" class="col-md-4 control-label">Buys</label>--}}

{{--<div class="col-md-6">--}}
{{--<input type="text" class="form-control form-control-lg"--}}
{{--id="lgFormGroupInput" placeholder="buys" name="buys"--}}
{{--value="{{$product->buys}}">--}}

{{--</div>--}}
{{--</div>--}}
{{--<img width="200" src="{{asset($product->img)}}">--}}
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
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}