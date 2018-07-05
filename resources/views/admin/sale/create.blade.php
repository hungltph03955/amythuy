@extends('templates.master')

@section('content')
    @extends('error')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Create New Product </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{action('Admin\SaleController@store')}}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_id" class="col-md-4 control-label">Product</label>
                                <br>
                                <div class="col-md-6">

                                <select id="product_id" class="selectpicker form-control col-md-6 "  name="product_id" data-live-search="true" title="Please select a country ...">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                                {{ $product->id==$id ? 'selected' : '' }}>{{$product->name}}</option>
                                    @endforeach

                                </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                <label for="sale_price" class="col-md-4 control-label">Sale price </label>

                                <div class="col-md-6">
                                    <input id="sale_price" type="text" class="form-control" name="sale_price" value="{{ old('sale_price') }}" required autofocus>

                                    @if ($errors->has('sale_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sale_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="col-md-4 control-label">Start date</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>

                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="col-md-4 control-label">End date</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required autofocus>

                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection