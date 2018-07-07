@extends('layouts.endUser.homepage')
@section('title')
    CATEGORIES
@endsection
@push('styles')
@endpush
@section('content')
    <!-- Title Page -->
    @include('element.detail.title', ['title' => $category->value('name')])
    <section class="p-t-50 p-b-40 flex-col-c-m Women-gach">
        <div class="Women-gach-float">
            <h2 class="l-text2 t-center">
                {{$category->value('name')}}
            </h2>
        </div>
        <div class="Women-gach-float">
            <p class="m-text13 t-center">
                ( 105 product )
            </p>
        </div>
    </section>

    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                <select class="selection-2" name="sorting">
                                    <option>Color</option>
                                    <option>Popularity</option>
                                    <option>Price: low to high</option>
                                    <option>Price: high to low</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                <select class="selection-2" name="sorting">
                                    <option>Size</option>
                                    <option>$0.00 - $50.00</option>
                                    <option>$50.00 - $100.00</option>
                                    <option>$100.00 - $150.00</option>
                                    <option>$150.00 - $200.00</option>
                                    <option>$200.00+</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                <select class="selection-2" name="sorting">
                                    <option>Collection</option>
                                    <option>$0.00 - $50.00</option>
                                    <option>$50.00 - $100.00</option>
                                    <option>$100.00 - $150.00</option>
                                    <option>$150.00 - $200.00</option>
                                    <option>$200.00+</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                <select class="selection-2" name="sorting">
                                    <option>Material</option>
                                    <option>$0.00 - $50.00</option>
                                    <option>$50.00 - $100.00</option>
                                    <option>$100.00 - $150.00</option>
                                    <option>$150.00 - $200.00</option>
                                    <option>$200.00+</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                <select class="selection-2" name="sorting">
                                    <option>Price</option>
                                    <option>$0.00 - $50.00</option>
                                    <option>$50.00 - $100.00</option>
                                    <option>$100.00 - $150.00</option>
                                    <option>$150.00 - $200.00</option>
                                    <option>$200.00+</option>
                                </select>
                            </div>


                        </div>
                        <span class="s-text8 p-t-5 p-b-5">
                            <div class="w-size2 filter-toww-size2">
                                <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    Filter
                                </a>
                            </div>
                        </span>
                    </div>
                    <!-- Product -->
                    <div class="row">
                        @if(isset($products))
                            @foreach($products as $product)
                                <div class="col-sm-6 col-md-6 col-lg-4 p-b-50">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $product->img))
                                                <img src="{{PATH_IMAGE_MASTER. $product->img}}"
                                                     alt="{{$product->name ? $product->name : ''}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                            <div class="block2-overlay trans-0-4">
                                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                                    <!-- Button -->
                                                    <a href="{{route('home.detail',['slug'=> $product->slug,'id'=> $product->id])}}"
                                                       class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                        view more
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block2-txt p-t-20">
                                            <a href="product-detail.html"
                                               class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                                {{$product->name ? $product->name : ''}}
                                            </a>
                                            <span class="block2-price m-text6 p-r-5 textprice">
                                            {{$product->price ? $product->price : ''}} {{ MONEY }}
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="pagination flex-m flex-w p-t-26">
                        <div class="pagination-center endUserCategory">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection