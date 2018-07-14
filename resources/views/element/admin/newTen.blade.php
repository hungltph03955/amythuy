<div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Thứ tự</th>
            <th>Tiêu đề tin tức</th>
            <th style="width: 10%;">Ảnh đại diện</th>
            <th>Trạng thái</th>
            <th>ngày đăng</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach($blogNew as $listNewsData)
            <?php $stt++ ?>
            <tr>
                <td>{{ $stt }}</td>
                <td>{{ $listNewsData->name  }}</td>
                <td class="imageProductTd">
                    <div class="imageProduct">
                        @if(file_exists( public_path().PATH_IMAGE_NEWS. $listNewsData->img))
                            <img src="{{PATH_IMAGE_NEWS. $listNewsData->img}}">
                        @else
                            <img src="{{PATH_NO_IMAGE}}">
                        @endif
                    </div>
                </td>
                <td>
                    @if($listNewsData->status === 1)
                        <span class="label label-danger">Ẩn</span>
                    @else
                        <span class="label label-success">Hiện</span>
                    @endif
                </td>
                <td>{{ $updatedDate = date("d-m-Y", strtotime($listNewsData->updated_at)) }}</td>
                <td>
                    <a href="{{ route('getNewsEdit', ['id' => $listNewsData->id]) }}"
                       class="btn btn-primary">Chỉnh
                        sửa</a>
                    <a href="{{ route('getNewsDel', ['id' => $listNewsData->id]) }}"
                       class="btn btn-danger" onclick="return ConfirmDelete()">Xóa
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>