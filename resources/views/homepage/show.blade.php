@extends('templates.homepage')
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

		<a href="product.html" class="s-text16">
			Women
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			T-Shirt
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
				Boxy T-Shirt with Roll Sleeve Detail
			</span>
	</div>

    <!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80 div-order">
    <div class="flex-w flex-sb">
        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>

                <div class="slick3">
                    <div class="item-slick3" data-thumb="{{asset('endUser/images/thumb-item-01.jpg')}}">
                        <div class="wrap-pic-w">
                            <img src="{{asset('endUser/images/product-detail-01.jpg')}}" alt="IMG-PRODUCT">
                        </div>
                    </div>

                    <div class="item-slick3" data-thumb="{{asset('endUser/images/thumb-item-02.jpg')}}">
                        <div class="wrap-pic-w">
                            <img src="{{asset('endUser/images/product-detail-02.jpg')}}" alt="IMG-PRODUCT">
                        </div>
                    </div>

                    <div class="item-slick3" data-thumb="{{asset('endUser/images/thumb-item-03.jpg')}}">
                        <div class="wrap-pic-w">
                            <img src="{{asset('endUser/images/product-detail-03.jpg')}}" alt="IMG-PRODUCT">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-size14 p-t-30 respon5">
            <h4 class="product-detail-name m-text16 p-b-13">
                Boxy T-Shirt with Roll Sleeve Detail
            </h4>

            <span class="m-text17">
					$22
				</span>

            <p class="s-text8 p-t-10">
                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
            </p>

            <!--  -->
            <div class="p-t-33 p-b-60">
                <div class="flex-m flex-w p-b-10">
                    <div class="s-text15 w-size15 t-center">
                        Size
                    </div>

                    <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                        <select class="selection-2" name="size">
                            <option>Choose an option</option>
                            <option>Size S</option>
                            <option>Size M</option>
                            <option>Size L</option>
                            <option>Size XL</option>
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
                            <option>Gray</option>
                            <option>Red</option>
                            <option>Black</option>
                            <option>Blue</option>
                        </select>
                    </div>
                </div>

                <div class="flex-m flex-w">
                    <div class="s-text15 w-size15 t-center">
                        Material
                    </div>

                    <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                        <select class="selection-2" name="color">
                            <option>Choose an option</option>
                            <option>Gray</option>
                            <option>Red</option>
                            <option>Black</option>
                            <option>Blue</option>
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
                            <!-- Button -->
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 btn-Order">
                                Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-b-45">
                <span class="s-text8 m-r-35">Categories: Mug, Design</span>
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
                                Black Friday Guide: Best Sales & Discount Codes
                            </h4>
                            <p class="p-b-25">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sed turpis sed lorem
                                dignissim vulputate nec cursus ante. Nunc sit amet tempor magna. Donec eros sem, porta
                                eget leo et, varius eleifend mauris. Donec eu leo congue, faucibus quam eu, viverra
                                mauris. Nulla consectetur lorem mi, at scelerisque metus hendrerit vitae. Proin vel
                                magna vel neque porta ultricies non eget mauris. Suspendisse potenti.
                            </p>
                            <p class="p-b-25">
                                Aliquam faucibus scelerisque placerat. Vestibulum vel libero eu nulla varius pretium
                                eget eu magna. Pellentesque habitant morbi tristique senectus et netus et malesuada
                                fames ac turpis egestas. Aenean dictum faucibus felis, ac vestibulum risus mollis in.
                                Phasellus neque dolor, euismod vitae auctor eget, dignissim a felis. Etiam malesuada
                                elit a nibh aliquam, placerat ultricies nibh dictum. Nam ut egestas velit. Pellentesque
                                viverra tincidunt tellus. Etiam cursus, ligula id vehicula cursus, turpis mauris
                                facilisis massa, eget tincidunt est purus et odio. Nam quis luctus libero, non posuere
                                velit. Ut eu varius diam, eu euismod elit. Donec efficitur, neque eu consectetur
                                consectetur, dui sem consectetur felis, vitae rutrum risus urna vel arcu. Aliquam semper
                                ullamcorper laoreet. Sed arcu lectus, fermentum imperdiet purus eu, ornare ornare
                                libero.
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
                            <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5 view-more-product">
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
                            <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5 view-more-product">
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
                            <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5 view-more-product">
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
                            <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5 view-more-product">
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
                            <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5 view-more-product">
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