@extends('layouts.admin.master')
@section('content')
    {{--@extends('error')--}}
    <section class="content-header content-child">
        <h1>Thêm mới quản trị viên
            <small>(Thêm mới)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Thêm mới quản trị viên</a></li>
            <li class="active"><a href="#">Thêm mới quản trị viên</a></li>
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
                        <form role="form" method="POST" action="{{action('Admin\UserController@postUsersAdd')}}">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên : </label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email : </label>
                                    <input id="description" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu : </label>
                                    <input id="description" type="password" class="form-control" name="password"
                                           value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Xác nhận mật khẩu: </label>
                                    <input id="description" type="password" class="form-control" name="configpassword"
                                           value="{{ old('configpassword') }}">
                                    @if ($errors->has('configpassword'))
                                        <span class="help-block categoryAdd">
                                                <strong>{{ $errors->first('configpassword') }}</strong>
                                            </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">cấp độ</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="roles" id="optionsRadios1" value="2"
                                                   checked="">
                                            Admin
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
