@extends('layouts.endUser.homepage')
@section('title')
Sale
@endsection
@push('styles')
@endpush
@section('content')
<!-- Title Page -->
@include('element.section.title', [
        'titleCat' => 'Sale',
        'descriptionCat' => '',
        'imgCat' => asset('endUser/images/find-a-stylist.jpg')])

    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 p-b-50">
                    <!-- Product -->
                    <div class="row">
                        @if(isset($productSales))
                            @foreach($productSales as $productSale)
                                <?php printf($productSale) ?>
                                <div class="col-sm-6 col-md-6 col-lg-4 p-b-50">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $productSale->img))
                                                <img src="{{PATH_IMAGE_MASTER. $productSale->img}}"
                                                     alt="{{$productSale->name ? $productSale->name : ''}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                            <div class="block2-overlay trans-0-4">
                                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                                    <!-- Button -->
                                                    <a href="{{route('endUser.product.detail',['id'=> $productSale->id, 'slug'=> $productSale->slug])}}"
                                                       class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                        view more
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block2-txt p-t-20">
                                            <a href="{{route('endUser.product.detail',['id'=> $productSale->id, 'slug'=> $productSale->slug])}}"
                                               class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                                {{$productSale->name ? $productSale->name : ''}}
                                            </a>
                                            <span class="block2-price m-text6 p-r-5 textprice">
                                                {{MONEY}}{{number_format($productSale->price)  }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection