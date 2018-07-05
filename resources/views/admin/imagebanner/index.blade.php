@extends('templates.master')
@section('content')
    @extends('error')
    <section class="content-header content-child">
        <h1> Danh sách banner
            <small>(Danh sách)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Danh sách banner</a></li>
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
                        <a class="btn btn-success" href="{{ action('Admin\ImagebannerController@create') }}">
                            Thêm ảnh banner</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tiêu đề banner</th>
                                <th>Ảnh</th>
                                <th>Trạng thái</th>
                                <th>ngày đăng</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 0 ?>
                            @foreach($imagesBanner as $imagesBannerData)
                                <?php $stt++ ?>
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $imagesBannerData->name  }}</td>
                                    <td class="imageProductTd">
                                        <div class="imageProduct">
                                            @if(file_exists( public_path().PATH_IMAGE_BANNER. $imagesBannerData->img))
                                                <img src="{{PATH_IMAGE_BANNER. $imagesBannerData->img}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($imagesBannerData->status === 1)
                                            <span class="label label-danger">Ẩn</span>
                                        @else
                                            <span class="label label-success">Hiện</span>
                                        @endif
                                    </td>
                                    <td>{{ $updatedDate = date("d-m-Y", strtotime($imagesBannerData->updated_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.imagebanner.deleteimagebanner', ['id' => $imagesBannerData->id]) }}"
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




    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 col-md-offset-0">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">--}}
    {{--Product List--}}
    {{--</div>--}}
    {{--<div class="col-lg-pull">--}}
    {{--<a class="btn btn-success" href="{{ action('Admin\ImagebannerController@create') }}">--}}
    {{--Create </a>--}}
    {{--</div>--}}
    {{--<div class="box-body">--}}

    {{--<table class="table table-bordered table-hover dataTable">--}}
    {{--<tr>--}}
    {{--<th>Id</th>--}}
    {{--<th>Image</th>--}}
    {{--<th>Banner</th>--}}
    {{--<th>Price</th>--}}
    {{--<th>Description</th>--}}
    {{--<th>Action</th>--}}
    {{--</tr>--}}
    {{--@foreach ($imagesBanner as $image)--}}
    {{--<tr>--}}
    {{--<td>{{ $image->id }}</td>--}}
    {{--<td><img width="100" src="{{asset($image->name)}}"></td>--}}
    {{--<td>{{ $image->banner }}</td>--}}
    {{--<td>{{ $image->price }}</td>--}}
    {{--<td>{{ $image->description }}</td>--}}
    {{--<td>--}}
    {{--{!! Form::open(['method' => 'DELETE','route' => ['imagebanner.destroy', $image->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']) !!}--}}
    {{--{!! Form::open(['method' => 'DELETE','action' => ['Admin\ImagebannerController@destroy',$image->id],'style'=>'display:inline']) !!}--}}
    {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
    {{--{!! Form::close() !!}--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--{!! $imagesBanner->links() !!}--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    <script>

        function ConfirmDelete() {
            var x = confirm("Bạn có chắc chắn muốn xóa?");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endsection
