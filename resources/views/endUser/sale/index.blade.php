@extends('layouts.endUser.homepage')
@section('title'){{ __('messages.sale') }}@endsection
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
                                <div class="col-sm-6 col-md-6 col-lg-4 p-b-50">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-img hov-img-zoom wrap-pic-w of-hidden pos-relative block2-labelsale">
                                            <?php $img = isset($productSale->product->img)? $productSale->product->img : '' ?>
                                            <a href="{{route('endUser.product.detail',[
                                                        'id'=> isset($productSale->product->id)?$productSale->product->id:'',
                                                        'slug'=> isset($productSale->product->slug)?$productSale->product->slug:''])}}">
                                                @if(file_exists( public_path().PATH_IMAGE_MASTER. $productSale->product->img))
                                                    <img src="{{PATH_IMAGE_MASTER. $img}}"
                                                        alt="{{isset($productSale->name) ? $productSale->product->name : ''}}">
                                                @else
                                                    <img src="{{PATH_NO_IMAGE}}">
                                                @endif
                                            </a>
                                            <!-- <div class="block2-overlay trans-0-4"> -->
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <a href="{{route('endUser.product.detail',[
                                                    'id'=> isset($productSale->product->id)?$productSale->product->id:'',
                                                    'slug'=> isset($productSale->product->slug)?$productSale->product->slug:''])}}"
                                                    class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">{{ __('messages.btn_view_more') }}</a>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="block2-txt p-t-20">
                                            <a href="{{route('endUser.product.detail',['id'=> $productSale->product->id, 'slug'=> $productSale->product->slug])}}"
                                               class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                                {{isset($productSale->product->name) ? $productSale->product->name : ''}}
                                            </a>
                                            <span class="block2-oldprice m-text7 p-r-5">
                                                {{MONEY}}{{isset($productSale->product->price) ? number_format($productSale->product->price) : ''}}
                                            </span>
                                            <span class="block2-price m-text6 p-r-5 textprice">
                                                {{MONEY}}{{$productSale->sale_price}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="pagination flex-m flex-w p-t-26">
                        <div class="pagination-center endUserCategory">
                            {{$productSales->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection