@extends('layouts.endUser.homepage')
@section('title')
Home
@endsection
@push('styles')
@endpush
@section('content')
<!-- Slide1 -->
@include('element.section.slide')
<!-- Banner -->
@include('element.section.banner')
<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105 category-mu-fixpading">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                Category
            </h3>
        </div>
        <!-- Product -->
        <div class="wrap-slick2">
            <div class="slick2">

                <!-- Product item-->
                <div class="item-slick2 p-l-15 p-r-15 ">
                    <!-- Block2 -->
                    <div class="block2 category-mu">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative hov-img-zoom category-mudix-rom">
                            <img src="{{asset('endUser/images/17699_1472729133.png')}}" alt="IMG-PRODUCT">
                            <div class="trans-0-4">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20 category-mudix-woment">
                            <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                WOMEN HANDBAGS
                            </a>

                            <span class="block2-price m-text6 p-r-5">
                                <div class="w-size2 category-toww-size2">
                                    <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                        View more
                                    </a>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Product item-->
                <div class="item-slick2 p-l-15 p-r-15 ">
                    <!-- Block2 -->
                    <div class="block2 category-mu">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative hov-img-zoom category-mudix-rom">
                            <img src="{{asset('endUser/images/17699_1472729133.png')}}" alt="IMG-PRODUCT">
                            <div class="trans-0-4">
                                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20 category-mudix-woment">
                            <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                WOMEN HANDBAGS
                            </a>

                            <span class="block2-price m-text6 p-r-5">
                                <div class="w-size2 category-toww-size2">
                                    <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                        View more
                                    </a>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('element.section.blog',[])
<!-- Blog -->

@endsection