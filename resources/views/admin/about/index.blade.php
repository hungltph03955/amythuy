@extends('layouts.admin.master')
@section('content')
    @extends('error')
    <section class="content-header content-child">
        <h1> Danh sách màu sắc sản phẩm
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Danh sách màu sắc sản phẩm</a></li>
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
                        <a class="btn btn-success" href="{{ action('Admin\ColorController@getColorAdd') }}">
                            Thêm màu sắc</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên màu sắc</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>ngày đăng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @foreach($ColorListData as $item_ColorListData)
                                <?php $stt++ ?>
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $item_ColorListData['name']  }}</td>
                                    <td>{{ $item_ColorListData['description']  }}</td>
                                    <td>
                                        @if($item_ColorListData['status']===1)
                                            <span class="label label-danger">Ẩn</span>
                                        @else
                                            <span class="label label-success">Hiện</span>
                                        @endif
                                    </td>
                                    <td>{{ $updatedDate = date("d-m-Y", strtotime($item_ColorListData['updated_at'])) }}</td>

                                    <td>
                                        <a href="{{ route('getColorEdit', ['id' => $item_ColorListData["id"] ]) }}"
                                           class="btn btn-primary">Chỉnh
                                            sửa</a>

                                        <a href="{{ route('getColorDel', ['id' => $item_ColorListData["id"] ]) }}"
                                           class="btn btn-danger" onclick="return ConfirmDelete()">Xóa
                                        </a>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>

        function ConfirmDelete() {
            var x = confirm("Bạn có chắc chắn muốn xóa màu sắc này ?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
