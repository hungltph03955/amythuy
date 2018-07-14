@extends('layouts.admin.master')

@section('content')
    @extends('error')
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> Edit Sale </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{action('Admin\SaleController@update', $sale->id)}}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name" value="{{$sale->name}}">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_id" class="col-md-3 control-label">Product</label>
                                <div class="col-md-9">
                                <select id="product_id" class="selectpicker form-control"  name="product_id" data-live-search="true" title="Please select a country ...">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                                {{ $product->id==$sale->product_id ? 'selected' : '' }}>{{$product->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sale_price" class="col-md-3 control-label">Sale Price</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="sale_price" name="sale_price" value="{{$sale->sale_price}}">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-3 control-label">Description</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="description" name="description" value="{{$sale->description}}">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start_date" class="col-md-3 control-label">Start date</label>

                                <div class="col-md-9">
                                    <input type="date" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="start_date" name="start_date" value="{{$sale->start_date}}">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="col-md-3 control-label">End date</label>

                                <div class="col-md-9">
                                    <input type="date" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="end_date" name="end_date" value="{{$sale->end_date}}">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection