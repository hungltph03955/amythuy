@extends('layouts.endUser.homepage')
@section('title')
{{$product->name}}
@endsection
@push('styles')
@endpush
@section('content')

    <!-- breadcrumb -->
    <div class="bread-crumb bgwhite flex-w p-l-250 p-r-15 p-t-30 p-l-15-sm link-home-discount">
        <a href="index.html" class="s-text16">
            Home
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        @if(isset($catesParent->name))
            <a href="/category/{{$product->category->slug}}" class="s-text16">
                {{$catesParent->name}}
                <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
            </a>
        @endif
        <a href="/category/{{$product->category->slug}}" class="s-text16">
            {{$product->category->name}}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        <a href="/product/{{$product->id}}/{{$product->slug}}.html" class="s-text16">
            {{$product->name}}
        </a>
    </div>

    <!-- Product Detail -->
    <div class="container bgwhite p-t-35 p-b-80 div-order">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>
                    <div class="slick3">
                        @if(isset($product->img))
                            <div class="item-slick3" data-thumb="{{asset(PATH_IMAGE_MASTER.$product->img)}}">
                                <div class="wrap-pic-w">
                                    <img src="{{asset(PATH_IMAGE_MASTER.$product->img)}}"
                                         alt="IMG-PRODUCT">
                                </div>
                            </div>
                        @endif

                        @if(isset($productImageDetail))
                            @if(count($productImageDetail) >0)
                                @foreach($productImageDetail as $productImageDetailItem)
                                    <div class="item-slick3"
                                         data-thumb="{{asset(PATH_IMAGE_DETAIL.$productImageDetailItem->name)}}">
                                        <div class="wrap-pic-w">
                                            <img src="{{asset(PATH_IMAGE_DETAIL.$productImageDetailItem->name)}}"
                                                 alt="IMG-PRODUCT">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif

                        @if(isset($colorCurrent))
                            @foreach($colorCurrent as $colorCurrentImageDetailItem)
                                <div class="item-slick3"
                                     data-thumb="{{asset(PATH_IMAGE_COLOR.$colorCurrentImageDetailItem->img)}}">
                                    <div class="wrap-pic-w">
                                        <img src="{{asset(PATH_IMAGE_COLOR.$colorCurrentImageDetailItem->img)}}"
                                             alt="IMG-PRODUCT">
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{$product->name}}
                </h4>

                <span class="m-text17">{{MONEY}}{{number_format($product->price)}}</span>
                <!--  -->
                <div class="p-t-33 p-b-60">
                    <div class="flex-m flex-w p-b-10">
                        <div class="s-text15 w-size15 t-center">
                            Size
                        </div>
                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="size">
                                <option>Choose an option</option>
                                @if(isset($sizeCurrent))
                                    @foreach($sizeCurrent as $sizeCurrentItem)
                                        <option value="{{ $sizeCurrentItem->size_id }}">{{ $sizeCurrentItem->sizes_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="flex-m flex-w p-b-10">
                        <div class="s-text15 w-size15 t-center">
                            Color
                        </div>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="color" id="colorSelect">
                                <option>Choose an option</option>
                                @if(isset($colorCurrent))
                                    @foreach($colorCurrent as $colorCurrentItem)
                                        <option value="{{ $colorCurrentItem->colors_id }}"
                                            data-color="{{ $colorCurrentItem->img }}">{{ $colorCurrentItem->colors_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div id="wrap-slick3-dots"></div>
                    </div>

                    <div class="flex-m flex-w">
                        <div class="s-text15 w-size15 t-center">
                            Material
                        </div>
                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="material">
                                <option>Choose an option</option>
                                @if(isset($materialCurrent))
                                    @foreach($materialCurrent as $materialCurrentItem)
                                        <option value="{{ $materialCurrentItem->materials_id }}">{{ $materialCurrentItem->materials_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product"
                                       value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 btn-Order btn-addcart-product"
                                        data-id="{{$product->id}}">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-b-45">
                    <span class="s-text8 m-r-35">Categories: {{ isset($catesParent->name)? $catesParent->name. ',': ''  }}
                        {{$product->category->name}}</span>
                </div>
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">{!!$product->description!!}</div>
				</div>
                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23" style="display: none;">
						<p class="s-text8"></p>
					</div>
				</div>
            </div>
        </div>
    </div>
    <!-- <section class="bgwhite p-t-60 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 p-b-80 discount">
                    <div class="p-r-50 p-r-0-lg">
                        <div class="p-b-40 discount">
                            <div class="blog-detail-txt p-t-33">
                                <h4 class="p-b-11 m-text24">
                                    {{$product->name ? $product->name : ''}}
                                </h4>
                                <p class="p-b-25 descriptionProduct">
                                    {!! $product->description ? $product->description : '' !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Relate Product -->
    <section class="relateproduct bgwhite p-t-45 p-b-138">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @if(isset($productRelated))
                        @foreach($productRelated as $productRelatedItem)
                            <div class="p-l-15 p-r-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                        @if(file_exists( public_path().PATH_IMAGE_MASTER. $productRelatedItem->img))
                                            <img src="{{PATH_IMAGE_MASTER. $productRelatedItem->img}}"
                                                 alt="{{$productRelatedItem->name ? $productRelatedItem->name : ''}}">
                                        @else
                                            <img src="{{PATH_NO_IMAGE}}">
                                        @endif
                                        <div class="block2-overlay trans-0-4">
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <a href="{{route('endUser.product.detail',['slug'=> $productRelatedItem->slug,'id'=> $productRelatedItem->id])}}"
                                                   class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    view more
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block2-txt p-t-20">
                                        <a href="product-detail.html"
                                           class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                            {{$productRelatedItem->name ? $productRelatedItem->name : ''}}
                                        </a>
                                        <span class="block2-price m-text6 p-r-5 textprice">
                                            {{MONEY}}{{number_format($productRelatedItem->price)}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </section>

@endsection