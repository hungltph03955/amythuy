<div class="box-body">
    <table class="table table-bordered table-hover dataTable">
        <thead>
        <tr>
            <th>Thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục sản phẩm</th>
            <th>Trạng thái</th>
            <th>Ảnh đại diện</th>
            <th>Giá sản phẩm</th>
            <th>ngày đăng</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($productDasskbornd as $product)
            <?php $stt++ ?>
            <tr>
                <td>{{ $stt }}</td>
                <td>{{ $product->name}}</td>
                <td>
                    @if(isset($product->category->name))
                        {{ $product->category->name}}
                    @endif
                </td>
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
</div>