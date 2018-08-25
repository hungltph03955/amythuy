@extends('layouts.admin.master')
@section('content')
    @extends('error')
    <section class="content-header content-child">
        <h1> Danh sách sản phẩm
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li class="active"><a href="#">Danh sách</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách</h3>
                    </div>
                    <div class="box-body">
                        <a class="btn btn-success" href="{{ action('Admin\ProductController@create') }}">
                            Thêm Sản phẩm </a>
                    </div>
                    <div class="box-body">
                        <form action="{{route('product.index')}}" method="get" class="form-inline">
                            <table class="table table-bordered table-hover dataTable">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="inputSearch">Tên sản phẩm :</label>
                                            <input type="text" name="searchNameProduct" id="name" class="form-control"
                                                   value="{{ isset($searchNameProduct) ? $searchNameProduct : null }}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group product-input-search">
                                            <label class="inputSearch">Danh mục : </label>
                                            <select class="form-control" name="searchCategory">
                                                <option value="0">Không chọn danh mục sản phẩm</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $searchCategory == $category->id ? 'selected="selected"' : '' }}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="inputSearch">Màu sắc : </label>
                                            <select name='search_color_id' class="form-control">
                                                <option value="0">Không chọn màu sắc</option>
                                                @if(isset($color))
                                                    @foreach ($color as $itemColor)
                                                        <option value="{{ $itemColor['id'] }}" {{ $searchColorProduct == $itemColor['id'] ? 'selected="selected"' : '' }}>{{ $itemColor['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group product-input-search">
                                            <label class="inputSearch">Kích cỡ : </label>
                                            <select class="form-control" name="size_id">
                                                <option value="0">Không chọn kích cỡ</option>
                                                @if(isset($size))
                                                    @foreach ($size as $itemSize)
                                                        <option value="{{ $itemSize['id'] }}" {{ $searchSizeProduct == $itemSize['id'] ? 'selected="selected"' : '' }}>{{ $itemSize['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group product-input-search">
                                            <label class="inputSearch">Chất liệu : </label>
                                            <select class="form-control" name="material_id">
                                                <option value="0">Không chọn chất liệu</option>
                                                @if(isset($material))
                                                    @foreach ($material as $itemMaterial)
                                                        <option value="{{ $itemMaterial['id'] }}" {{ $searchMaterialProduct == $itemMaterial['id'] ? 'selected="selected"' : '' }}>{{ $itemMaterial['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group product-input-search">
                                            <label class="inputSearch">Bộ sưu tập : </label>
                                            <select class="form-control" name="collection_id">
                                                <option value="0">Không chọn bộ sưu tập</option>
                                                @if(isset($collection))
                                                    @foreach ($collection as $itemCollection)
                                                        <option value="{{ $itemCollection['id'] }}" {{ $searchCollectionProduct == $itemCollection['id'] ? 'selected="selected"' : '' }}>{{ $itemCollection['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p></p>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục sản phẩm</th>
                                @if(isset($products[0]->colors_id) && $products[0]->colors_id != '')
                                    <th>Màu sắc</th>
                                @endif
                                @if(isset($products[0]->sizes_id) && $products[0]->sizes_id != '')
                                    <th>kích cỡ</th>
                                @endif
                                @if(isset($products[0]->materials_id) && $products[0]->materials_id != '')
                                    <th>Chất liệu</th>
                                @endif
                                @if(isset($products[0]->collections_id) && $products[0]->collections_id != '')
                                    <th>Bộ sưu tập</th>
                                @endif
                                <th>Trạng thái</th>
                                <th>Ảnh đại diện</th>
                                <th>Giá sản phẩm</th>
                                <th>ngày đăng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>

                            @foreach($products as $product)

                                <?php $stt++ ?>
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>
                                        @if(isset($product['category']))
                                            @if(count(isset($product['category'])) >0)
                                                @foreach($product['category'] as $productCategoryName)
                                                    <span class="productCategoryName">{{ $productCategoryName->name }}
                                                        {{ ' ' }}</span>
                                                @endforeach
                                            @endif
                                        @endif
                                    </td>
                                    @if(isset($product->colors_id) && $product->colors_id != '')
                                        <td>
                                            <span class="colors_name_search">  {{ $product->colors_name}}</span>
                                        </td>
                                    @endif
                                    @if(isset($product->sizes_id) && $product->sizes_id != '')
                                        <td>
                                            <span class="colors_name_search">  {{ $product->sizes_name}}</span>
                                        </td>
                                    @endif
                                    @if(isset($product->materials_id) && $product->materials_name != '')
                                        <td>
                                            <span class="colors_name_search">  {{ $product->materials_name}}</span>
                                        </td>
                                    @endif
                                    @if(isset($product->collections_id) && $product->collections_id != '')
                                        <td>
                                            <span class="colors_name_search">  {{ $product->collections_name}}</span>
                                        </td>
                                    @endif
                                    <td>
                                        @if($product->status === 1)
                                            <span class="label label-danger">Ẩn</span>
                                        @else
                                            <span class="label label-success">Hiện</span>
                                        @endif
                                    </td>
                                    <td class="imageProductTd">
                                        <div class="imageProduct">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $product->img))
                                                <img src="{{PATH_IMAGE_MASTER. $product->img}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $product->price}} </td>
                                    <td>{{ $updatedDate = date("d-m-Y", strtotime($product->updated_at)) }}</td>
                                    <td>
                                        <a href="{!! action('Admin\ProductController@edit', $product->id) !!}"
                                           class="btn btn-primary">Chỉnh
                                            sửa</a>
                                        <a href="{{ route('admin.product.delete', ['id' => $product->id ]) }}"
                                           class="btn btn-danger" onclick="return ConfirmDelete()">Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="productPagin">
                            {!! $products->appends(['searchNameProduct' => $searchNameProduct,'searchCategory' => $searchCategory])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có chắc chắc muốn xóa sản phẩm này?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
