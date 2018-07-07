@extends('layouts.admin.master')
@section('content')
    @extends('error')

    <section class="content-header content-child">
        <h1> Danh sách quản trị hệ thống
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Danh sách quản trị hệ thống</a></li>
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
                        <a class="btn btn-success" href="{{ action('Admin\UserController@getUsersAdd') }}">
                            Thêm người quản trị</a>
                    </div>
                    <div class="box-body">
                        <form action="{{route('getUsersList')}}" method="get" class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="keyword"
                                       value="{{ isset($search) ? $search : null }}">
                            </div>
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
                                <th>Id</th>
                                <th>Tên người quản trị</th>
                                <th>Cấp độ</th>
                                <th>Ngày khởi tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @foreach($userList as $userListData)
                                <?php $stt++ ?>
                                <tr>
                                    <td>{{ $userListData->id }}</td>
                                    <td>{{ $userListData->name}}</td>
                                    <td>
                                        @if($userListData->roles === 1)
                                            <span class="label label-danger">Supper Admin</span>
                                        @else
                                            <span class="label label-success">Admin</span>
                                        @endif
                                    </td>
                                    <td>{{ $updatedDate = date("d-m-Y", strtotime($userListData->updated_at)) }}</td>
                                    <td>
                                        <a href="{{ route('getUsersEdit', ['id' => $userListData->id]) }}"
                                           class="btn btn-primary">Chỉnh
                                            sửa</a>

                                        @if($userListData->roles != 1)
                                            <a href="{{ route('getUsersDel', ['id' => $userListData->id]) }}"
                                               class="btn btn-danger" onclick="return ConfirmDelete()">Xóa
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="productPagin">
                            {!! $userList->appends(['search' => $search])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function ConfirmDelete() {
            var x = confirm("Bạn có chắc chắn muốn xóa tài khoản này không ?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
@endsection
