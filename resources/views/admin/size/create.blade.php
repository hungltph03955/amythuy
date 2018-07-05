@extends('templates.master')
@section('content')
    {{--@extends('error')--}}
    <section class="content-header content-child">
        <h1>Thêm mới kích cỡ sản phẩm
            <small>(Thêm mới)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Thêm mới kích cỡ sản phẩm</a></li>
            <li class="active"><a href="#">Thêm mới kích cỡ</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <form role="form" method="POST" action="{{action('Admin\SizeController@postSizesAdd')}}">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên kích cỡ:</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <input id="description" type="text" class="form-control" name="description"
                                           value="{{ old('description') }}">
                                    @if ($errors->has('description'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios1" value="0"
                                                   checked="">
                                            Hiện
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" id="optionsRadios2"
                                                   value="1">
                                            Ẩn
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
