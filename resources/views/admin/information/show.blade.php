@extends('layouts.admin.master')
@section('content')
    @extends('error')

    <section class="content-header content-child">
        <h1>Chi tiết liên hệ
            <small>(Thêm mới)</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Quản trị hệ thống</a></li>
            <li><a href="#">Chi tiết liên hệ</a></li>
            <li class="active"><a href="#">Chi tiết</a></li>
        </ol>
        <p></p>
    </section>
    <p></p>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <form role="form" method="POST"
                              action="{{action('Admin\InformationController@show', $information->id)}} "
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàng :</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{$information->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chi tiết liên hệ:</label>
                                    <textarea name="description" id="editor1" rows="10" cols="80" disabled>
                                        {{$information->detail}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email :</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{$information->email}}" disabled>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-primary" href="mailto:{{$information->email}}">Send Email</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection