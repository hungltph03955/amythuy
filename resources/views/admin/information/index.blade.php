@extends('layouts.admin.master')
@section('content')
    @extends('error')

    <section class="content-header content-child">
        <h1> Danh sách Thông tin liên hệ khách hàng
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#"> Danh sách Thông tin liên hệ khách hàng</a></li>
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
                        <form action="{{route('information.index')}}" method="get" class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="Từ khóa"
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
                                <th>Khách hàng</th>
                                <th>ngày đăng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @foreach($information as $info)
                                <?php $stt++ ?>
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name}}</td>
                                    <td>{{ $updatedDate = date("d-m-Y", strtotime($info->updated_at)) }}</td>
                                    <td>
                                        <a href="{!! action('Admin\InformationController@show', $info->id) !!}"
                                           class="btn btn-primary">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="productPagin">
                            {!! $information->appends(['search' => $search])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
