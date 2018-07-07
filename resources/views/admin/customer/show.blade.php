@extends('layouts.admin.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Show Customer </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{action('Admin\CustomerController@show', $customer->id)}} " enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name" value="{{$customer->email}}" disabled>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name" value="{{$customer->address}}" disabled>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Identification</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name" value="{{$customer->cmt}}" disabled>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection