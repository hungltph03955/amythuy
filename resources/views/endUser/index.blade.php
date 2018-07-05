@extends('templates.homepage')
@section('title')
    HOME
@endsection
@push('styles')
@section('content')
    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1"
                     style="background-image: url({{asset('endUser/images/20423245e097904f3af97882e8e72cdd.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m sliderfix">
                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="fadeInUp">
                            Beautiful Dresses
                        </h2>
                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-2 s-text2 bgwhite hov1 trans-0-4">
                                View more
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1"
                     style="background-image: url({{asset('endUser/images/banner_fs_02.png')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m sliderfix">
                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="lightSpeedIn">
                            Beautiful Dresses
                        </h2>
                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-2 s-text2 bgwhite hov1 trans-0-4">
                                View more
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1"
                     style="background-image: url({{asset('endUser/images/br-noi-that-drhouse-1.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m sliderfix">
                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="rotateInUpRight">
                            Beautiful Dresses
                        </h2>
                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-2 s-text2 bgwhite hov1 trans-0-4">
                                View more
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Banner -->
    <section class="banner bgwhite p-t-40 p-b-40">
        <div class="container">

            <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-12 m-l-r-auto">
                    <div class="item-slick2 item1-slick1"
                         style="background-image: url({{asset('endUser/images/ribbon-2929380_1920.png')}});">

                    </div>
                    <div class="divCtaterory-first">
                        <h2 class="categoy-first" data-appear="rotateInUpRight">
                            SIlk made in Viet Nam
                        </h2>
                        <span class="divCtaterory-firstSpan">
                        <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5" tabindex="0">
                              Find the color you like
                            </a>
                    </span>
                        <div class="wrap-btn-slide1 w-size1 animated divCtaterory-first-aLink" data-appear="rotateIn"
                             style="width: 161px;">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-2 s-text2 bgwhite hov1 trans-0-4">
                                View more silk
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row category-tow">
                    <div class="col-sm-6 col-md-6 col-lg-6 m-l-r-auto category-tow-macgi-media">
                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30">
                            <img src="images/8.png" alt="IMG-BENNER">
                        </div>
                        <div class="w-size2 category-toww-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                View more
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 m-l-r-auto category-tow-macgi-media">
                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30">
                            <img src="images/2.png" alt="IMG-BENNER">
                        </div>
                        <div class="w-size2 category-toww-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                View more
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105 category-mu-fixpading">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Category
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    <div class="item-slick2 p-l-15 p-r-15 ">
                        <!-- Block2 -->
                        <div class="block2 category-mu">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative hov-img-zoom category-mudix-rom">
                                <img src="images/17699_1472729133.png" alt="IMG-PRODUCT">
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

                    <div class="item-slick2 p-l-15 p-r-15 ">
                        <!-- Block2 -->
                        <div class="block2 category-mu">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative hov-img-zoom category-mudix-rom">
                                <img src="images/b655506e85b0eb8187280fcb449fc9a5.png" alt="IMG-PRODUCT">
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

                    <div class="item-slick2 p-l-15 p-r-15 ">
                        <!-- Block2 -->
                        <div class="block2 category-mu">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative hov-img-zoom category-mudix-rom">
                                <img src="images/fOPRDj6N Christian Louboutin.png" alt="IMG-PRODUCT">
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

                    <div class="item-slick2 p-l-15 p-r-15 ">
                        <!-- Block2 -->
                        <div class="block2 category-mu">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative hov-img-zoom category-mudix-rom">
                                <img src="images/oUCcvwyp.png" alt="IMG-PRODUCT">
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

    <!-- Blog -->
    <section class="blog bgwhite p-t-94 p-b-65">
        <div class="container">
            <div class="sec-title p-b-52">
                <h3 class="m-text5 t-center">
                    Our Blog
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="images/801173742zcvxcbvzxcvb.png" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    Black Friday Guide: Best Sales & Discount Codes
                                </a>
                            </h4>
                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="images/801173742zcvxcbvzxcvbertertert.png" alt="IMG-BLOG">
                        </a>
                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    The White Sneakers Nearly Every Fashion Girls Own
                                </a>
                            </h4>
                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="block3">
                        <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                            <img src="images/801173742zcvxcbvzxcvbnbmbnmbn.png" alt="IMG-BLOG">
                        </a>

                        <div class="block3-txt p-t-14">
                            <h4 class="p-b-7">
                                <a href="blog-detail.html" class="m-text11">
                                    New York SS 2018 Street Style: Annina Mislin
                                </a>
                            </h4>

                            <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
                            <span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script></script>