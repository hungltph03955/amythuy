@extends('layouts.endUser.homepage')
@section('title')
    Detail product
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

        <a href="/category/{{$product->category->slug}}" class="s-text16">
            {{$product->category->name}}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        <a href="/show/{{$product->slug}}/{{$product->id}}" class="s-text16">
            {{$product->name}}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
    </div>

    <!-- Product Detail -->
    <div class="container bgwhite p-t-35 p-b-80 div-order">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>
                    <div class="slick3">
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
                            @else
                                <div class="item-slick3"
                                     data-thumb="{{asset(PATH_IMAGE_MASTER.$product->img)}}">
                                    <div class="wrap-pic-w">
                                        <img src="{{asset(PATH_IMAGE_MASTER.$product->img)}}"
                                             alt="IMG-PRODUCT">
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{$product->name ? $product->name : ''}}
                </h4>

                <span class="m-text17">
					{{ MONEY }}{{$product->price ? $product->price : ''}}
				</span>
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
                            <select class="selection-2" name="color">
                                <option>Choose an option</option>
                                @if(isset($colorCurrent))
                                    @foreach($colorCurrent as $colorCurrentItem)
                                        <option value="{{ $colorCurrentItem->colors_id }}">{{ $colorCurrentItem->colors_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
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
                                        data-id="{{$product->id}}">
                                    Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-b-45">
                    <span class="s-text8 m-r-35">Categories: {{$product->category->name}}</span>
                </div>
            </div>
        </div>
    </div>
    <section class="bgwhite p-t-60 p-b-25">
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

                                <p class="p-b-25">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed turpis sed lorem
                                    dignissim vulputate nec cursus ante. Nunc sit amet tempor magna. Donec eros sem,
                                    porta
                                    eget leo et, varius eleifend mauris. Donec eu leo congue, faucibus quam eu, viverra
                                    mauris. Nulla consectetur lorem mi, at scelerisque metus hendrerit vitae. Proin vel
                                    magna vel neque porta ultricies non eget mauris. Suspendisse potenti.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <div class="p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{asset('endUser/images/item-02.jpg')}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            View more
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="product-detail.html"
                                   class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                    Herschel supply co 25l
                                </a>

                                <span class="block2-price m-text6 p-r-5 textprice">
									$75.00
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{asset('endUser/images/item-02.jpg')}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            View more
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="product-detail.html"
                                   class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                    Herschel supply co 25l
                                </a>

                                <span class="block2-price m-text6 p-r-5 textprice">
									$75.00
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{asset('endUser/images/item-02.jpg')}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            View more
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="product-detail.html"
                                   class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                    Herschel supply co 25l
                                </a>

                                <span class="block2-price m-text6 p-r-5 textprice">
									$75.00
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{asset('endUser/images/item-02.jpg')}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            View more
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="product-detail.html"
                                   class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                    Herschel supply co 25l
                                </a>

                                <span class="block2-price m-text6 p-r-5 textprice">
									$75.00
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{asset('endUser/images/item-02.jpg')}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            View more
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="product-detail.html"
                                   class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                    Herschel supply co 25l
                                </a>

                                <span class="block2-price m-text6 p-r-5 textprice">
									$75.00
								</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection