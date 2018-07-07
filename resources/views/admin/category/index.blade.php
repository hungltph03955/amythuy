@extends('layouts.admin.master')
@section('content')
    @extends('error')

    <section class="content-header content-child">
        <h1> Danh mục sản phẩm
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Danh mục sản phẩm</a></li>
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
                        <a class="btn btn-success" href="{{ action('Admin\CategoryController@create') }}">
                            Thêm danh mục </a>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="category-th">Tên</th>
                                <th class="category-th">Trạng thái</th>
                                <th class="category-th">Mô tả</th>
                                <th class="category-th">Ngày đăng</th>
                                <th class="category-th">Thao tác</th>
                            </tr>
                            <?php
                            function listCategory ($data, $parent = 0, $str = "") {
                            $stt = 0;
                            foreach ($data as $val) {
                            $id = $val["id"];
                            $name = $val["name"];
                            $des = $val["description"];
                            $status = $val["status"];
                            $updated_at = $val["updated_at"];
                            $stt++;
                            if ($val["parent_id"] == $parent) {
                            ?>
                            <tr>
                                <?php
                                if ($str == "") {
                                ?>
                                <td class="list_td alignleft">{{$str.$name}}</td>
                                <?php
                                } else {?>
                                <td class="list_td alignleft">{{$str.$name}}</td>
                                <?php
                                }
                                ?>
                                <?php
                                if ($status === 1) {
                                ?>
                                <td><span class="label label-danger">Ẩn</span></td>
                                <?php
                                } else {?>
                                <td><span class="label label-success">Hiện</span></td>
                                <?php
                                }
                                ?>
                                <td class="list_td -align-left">{{$des}}</td>
                                <td class="list_td -align-left">
                                    {{ $updatedDate = date("d-m-Y", strtotime($updated_at)) }}
                                </td>
                                <td class="list_td aligncenter">
                                    <a href="{!! action('Admin\CategoryController@edit',$id) !!}"
                                       class="btn btn-primary">Chỉnh sửa</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $val['id']],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}
                                    {!! Form::open(['method' => 'DELETE','action' => ['Admin\CategoryController@destroy',$val['id']],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <br>
                                </td>
                            </tr>
                            <?php
                            listCategory($data, $id, $str . " --------------|");
                            }
                            }
                            }
                            ?>
                            <?php listCategory($data) ?>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>

        function ConfirmDelete() {
            var x = confirm("bạn có chắc chắn muốn xóa danh mục này?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
