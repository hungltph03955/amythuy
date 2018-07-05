@extends('templates.homepage')
@section('title')
    HOME
@endsection
@push('styles')
    <style>
        .pagination>li>a, .pagination>li>span {
            color: #f1f1f1;
            float: left;
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-left: 40px;
        }

        .pagination>li>a:hover, .pagination>li>a:focus {
            background: #ce3434;
            color: #333;
            text-decoration: none;
            color: #fff;
            display: block;
        }
        .pagination{
            background: rgba(30, 30, 30, 1);
            list-style-type: none;
            overflow: hidden;
            width: 30%;
            margin-left: 10px;
        }
        .col-sm-offset-2 {
            margin-top: -43px;
            float: right;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row" data-container="container">
            <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                <div data-widget-id="wid__store_breadcrumbs__5a7cfce1cedf6" class="moto-widget moto-widget-store-breadcrumbs moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto" data-widget="store_breadcrumbs">
                    <div class="container-fluid">
                        <div>
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li>
                                    <a href="/category/{{$slug}}">{{$category->value('slug')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="">

        <div class="container-fluid">
            <div class="row" data-container="container">


                <div class="moto-widget moto-widget-row__column moto-cell col-sm-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">

                    <div data-widget-id="wid__store_category_image__5a7cfce1d034a" class="moto-widget moto-widget-store-category-image moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-medium moto-spacing-left-auto" data-widget="store_category_image" data-preset="default">
                        <div class="moto-widget moto-widget-image moto-preset-default">
                            <div class="moto-widget-image-link">
                                <img src="{{asset($category->value('img'))}}" class="moto-widget-image-picture" title="{{$category->value('name')}}" alt="{{$category->value('name')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="moto-widget moto-widget-row__column moto-cell col-sm-9 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                    <div data-widget-id="wid__store_category_name__5a7cfce1d0fd9" class="moto-widget moto-widget-store-category-name moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto " data-widget="store_category_name" data-preset="default">
                        <div class="moto-widget-store-featured_row-title">
                            <h2 class="moto-text_218">{{$category->value('name')}}</h2>
                        </div>
                    </div>
                    <div data-widget-id="wid__store_category_description__5a7cfce1d1b54" class="moto-widget moto-widget-store-category-description moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto " data-widget="store_category_description" data-preset="default">

                        <div class="moto-widget-store-detail-text">
                            <p class="moto-text_219">&nbsp;{{$category->value('description')}}&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="moto-widget moto-widget-row moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="">

        <div class="container-fluid">
            <div class="row" data-container="container">


                <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                    <div data-widget-id="wid__spacer__5a7cfce1d1f37"
                         class="moto-widget moto-widget-spacer moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto moto-visible-on_tablet" data-widget="spacer" data-preset="default" data-spacing="aaaa" data-visible-on="tablet">
                        <div class="moto-widget-spacer-block" style="height:30px">

                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
    <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aaaa" style="">

        {{--<div class="container-fluid">--}}
            {{--<div class="row" data-container="container">--}}
                {{--<div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">--}}
                    {{--<div data-widget-id="wid__store_product_grid__5a7cfce1e0a69" class="moto-widget moto-widget-store-product-grid moto-preset-default moto-align-center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto " data-widget="store_product_grid" data-preset="default">--}}
                        {{--<div class="row moto-widget-store-featured_row moto-widget-store-featured_row-top">--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<div class="moto-widget-store-items_per_page">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-6">--}}
                                            {{--<span class="moto-widget-store-items_per_page-name moto-text_normal">Show</span>--}}
                                            {{--<span class="moto-widget-store-items_per_page-select">--}}
                    {{--<div class="moto-widget-store-select_box moto-widget-store-select_box-type_2 moto-widget-store-product-grid-select-pagination">--}}
                        {{--<div class="select">--}}
                            {{--<div class="select">--}}
                                {{--<select  class="s-hidden" name="p" id="p">--}}
                                        {{--<option data-class="single-option moto-text_normal"  selected=""  value="16">16</option>--}}
                                        {{--<option data-class="single-option moto-text_normal"  value="64">64</option>--}}
                                        {{--<option data-class="single-option moto-text_normal"  value="144">144</option>--}}
                                {{--</select>--}}
                                {{--<div class="styledSelect">16</div>--}}
                                {{--<ul class="options" style="display: none;">--}}
                                    {{--<li rel="/store/category/pizza/?page=1&amp;limit=16" class="single-option moto-text_normal">16</li>--}}
                                    {{--<li rel="/store/category/pizza/?page=1&amp;limit=64" class="single-option moto-text_normal">64</li>--}}
                                    {{--<li rel="/store/category/pizza/?page=1&amp;limit=144" class="single-option moto-text_normal">144</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<ul class="options"><li rel="/category/{{$slug}}" class="single-option moto-text_normal">16</li>--}}
                                {{--<li rel="/store/category/pizza/?page=1&amp;limit=64" class="single-option moto-text_normal">64</li>--}}
                                {{--<li rel="/store/category/pizza/?page=1&amp;limit=144" class="single-option moto-text_normal">144</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-6">--}}
                                            {{--<span class="moto-widget-store-items_per_page-name moto-text_normal">Sort by</span>--}}
                                            {{--<span class="moto-widget-store-items_per_page-select">--}}
                        {{--<div class="moto-widget-store-select_box moto-widget-store-select_box-type_2 moto-widget-store-product-grid-select-order" style="width: auto;">--}}
                            {{--<form method="post" class="ng-pristine ng-valid">--}}
                                {{--<div class="select"><div class="select"><select name="order_by" onchange="this.form.submit ()" class="s-hidden">--}}
                                    {{--<option data-class="single-option moto-text_normal" value="date_asc">Oldest First</option>--}}
                                    {{--<option data-class="single-option moto-text_normal" value="date_desc">Newest First</option>--}}
                                    {{--<option data-class="single-option moto-text_normal" value="price_asc">Price: Low to High</option>--}}
                                    {{--<option data-class="single-option moto-text_normal" value="price_desc">Price: High to Low</option>--}}
                                    {{--<option data-class="single-option moto-text_normal" value="name_asc">Name: A-Z</option>--}}
                                    {{--<option data-class="single-option moto-text_normal" value="name_desc">Name: Z-A</option>--}}

                                {{--</select><div class="styledSelect">Oldest First</div><ul class="options" style="display: none;"><li rel="date_asc" class="single-option moto-text_normal">Oldest First</li><li rel="date_desc" class="single-option moto-text_normal">Newest First</li><li rel="price_asc" class="single-option moto-text_normal">Price: Low to High</li><li rel="price_desc" class="single-option moto-text_normal">Price: High to Low</li><li rel="name_asc" class="single-option moto-text_normal">Name: A-Z</li><li rel="name_desc" class="single-option moto-text_normal">Name: Z-A</li></ul></div><ul class="options"><li rel="date_asc" class="single-option moto-text_normal">Oldest First</li><li rel="date_desc" class="single-option moto-text_normal">Newest First</li><li rel="price_asc" class="single-option moto-text_normal">Price: Low to High</li><li rel="price_desc" class="single-option moto-text_normal">Price: High to Low</li><li rel="name_asc" class="single-option moto-text_normal">Name: A-Z</li><li rel="name_desc" class="single-option moto-text_normal">Name: Z-A</li></ul></div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-4">--}}



                                {{--<div class="moto-widget-store-paginator moto-text_normal">--}}
                                   {{--<ul class="moto-widget-store-paginator-link">{{ $products->appends(['s'=>$s])->links()}}--}}
                                   {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--@foreach($products as $product)--}}
                                {{--<div class="col-sm-3">--}}
                                    {{--<div class="moto-widget-store-main_item moto-widget-store-image-block ">--}}

                                        {{--<div class="moto-widget moto-widget-image moto-preset-5">--}}
                                            {{--<a class="moto-widget-image-link" href="/show/{{$product->id}}">--}}
                                                {{--<img data-src="{{asset($product->img)}}" class="moto-widget-image-picture lazyloaded" src="{{asset($product->img)}}">--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                        {{--<a href="/product/{{$product->name}}" class="moto-widget-store-main_item-title ">--}}
                                            {{--<span class="moto-text_220">{{$product->name}}</span>--}}
                                        {{--</a>--}}
                                        {{--<div class="store-product-element-container">--}}

                                            {{--<div class="moto-widget-store-main_item-price">--}}
                                                {{--<span class="moto-text_221">{{$product->price}}</span>--}}
                                            {{--</div>--}}


                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@endforeach--}}
                        {{--</div>--}}
        <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium 			moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"	    data-grid-type="sm" data-widget="row" data-spacing="mala" style=""           data-draggable-disabled="">
            <div class="container-fluid">
                <div class="row" data-container="container">
                    <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                     <div data-widget-id="wid__store_product_grid__5a780872d760f" class="moto-widget moto-widget-store-product-grid moto-preset-default moto-align-center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto " data-widget="store_product_grid" data-preset="default">
                        <div class="row">
                            <div class="col-md-12" id="product_list">
                                @if(empty($products) < 0)
                                    <p>Dữ liệu chưa được cập nhật !</p>
                                @else
                                    @foreach($products as $product)
                                        <div class="col-md-3">
                                            <div class="moto-widget-store-main_item moto-widget-store-image-block ">
                                                <div class="moto-widget moto-widget-image moto-preset-5">
                                                    <a class="moto-widget-image-link link_pro"  data-id="{{$product['id']}}" href="{{route('home.detail',['id'=> $product['id']])}}">
                                                        <img id="img" data-src="{{url($product->img)}}" height="250" width="250" class="moto-widget-image-picture lazyload">						</a>
                                                </div>
                                                <a href="https://template65055.motopreview.com/store/product/marinated-oysters/" class="moto-widget-store-main_item-title ">
                                                    <span class="moto-text_220">{{$product['name']}}</span>
                                                </a>
                                                <div class="store-product-element-container">
                                                    <div class="moto-widget-store-main_item-price">
                                                        <span class="moto-text_221">{{$product['price']}}</span>
                                                    </div>
                                                </div>
                                                <div class="store-product-element-container moto-widget-button moto-preset-2" data-store-product-add-to-cart="" data-product-id="43" data-location="/store/cart/" data-autoredirect="1">
                                                    <a  class="moto-widget-button-link moto-size-large" >
                                                        <span class="fa moto-widget-theme-icon"></span>
                                                        <input type="hidden" name="name" id="name{{ $product->id }}" value="{{ $product->name }}">
                                                        <input type="hidden" name="price" id="price{{ $product->id }}" value="{{ $product->price }}">
                                                        <span class="moto-widget-button-label button_cart" value="" data-id="{{$product['id']}}" >THÊM VÀO GIỎ HÀNG</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-2"></div>
                        {{$products->links()}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.homepages.contact')
@endsection