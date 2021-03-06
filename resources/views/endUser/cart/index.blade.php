@extends('layouts.endUser.homepage')
@section('title'){{ __('messages.title_your_order') }}@endsection
@section('content')
<!-- Title Page -->
@include('element.section.title', [
        'titleCat' => __('messages.title_your_order'),
        'descriptionCat' => '',
        'imgCat' => asset('endUser/images/find-a-stylist.jpg')])
<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        @if(isset($carts) && count($carts) > 0)
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1">{{ __('messages.title_img_cart') }}</th>
                        <th class="column-2">{{ __('messages.title_product') }}</th>
                        <th class="column-3">{{ __('messages.title_price') }}</th>
                        <th class="column-4 p-l-70">{{ __('messages.title_quantity') }}</th>
                        <th class="column-5">{{ __('messages.title_total') }}</th>
                    </tr>

                    @foreach($carts as $cart)
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden del-item" data-id="{{$cart->rowId}}" data-url="{{route('endUser.cart.destroy')}}">
                                @if(file_exists( public_path().PATH_IMAGE_MASTER. $cart->options->image))
                                <img src="{{PATH_IMAGE_MASTER. $cart->options->image}}"
                                     alt="{{$cart->name ? $cart->name : ''}}">
                                @else
                                <img src="{{PATH_NO_IMAGE}}">
                                @endif
                            </div>
                        </td>
                        <td class="column-2"><a href="{{route('endUser.product.detail',['id'=> $cart->id, 'slug'=> $cart->options->slug])}}">{{$cart->name}}</a></td>
                        <td class="column-3">{{MONEY}}{{number_format((int)$cart->price,0)}}</td>
                        <td class="column-4">
                            <div class="flex-w bo5 of-hidden w-size17">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 update-cart" data-id="{{$cart->rowId}}" data-url="{{route('endUser.cart.update')}}">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number"
                                       name="num-product1"
                                       value="{{$cart->qty}}">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 update-cart" data-id="{{$cart->rowId}}" data-url="{{route('endUser.cart.update')}}">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </td>
                        <td class="column-5">
                            {{MONEY}}<span>{{number_format((int)$cart->subtotal, 0)}}</span>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">{{ __('messages.title_cart_totals') }}</h5>
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">{{ __('messages.title_total') }}:</span>
                <span class="m-text21 w-size20 w-full-sm cart-total">{{MONEY}}<span>{{$total}}</span></span>
            </div>
            <div class="size15 trans-0-4">
                <!-- Button -->
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    <a class="rl-checkout" href="{{route('endUser.order.index')}}">{{ __('messages.btn_checkout') }}</a>
                </button>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12 p-b-30">
                <div class="alert alert-info center"><strong>{{ __('messages.message_no_cart') }}</strong></div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection