<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-child2">
                <span class="topbar-email"></span>
                <div class="topbar-language rs1-select2">
                    <select class="selection-1" name="time">
                        <option>{{ __('messages.vietnamese') }}</option>
                        <option>{{ __('messages.english') }}</option>
                    </select>
                </div>
            </div>
            <div class="topbar-child1">
                <a href="/" class="logo">
                    <img src="{{asset('endUser/images/icons/logoAmthy.png')}}" alt="IMG-LOGO"/>
                </a>
            </div>
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-search searchAll"></a>
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <div class="topbar-child1" style="display: none;">
                <a href="/" class="logo">
                    <img src="{{asset('endUser/images/icons/logoAmthy.png')}}" alt="IMG-LOGO" style="width: 100px;"/>
                </a>
            </div>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu" id="main_menu_active">
                        <li class="noActive {{ request()->is('/') ? 'sale-noti' : '' }}"><a
                                    href="/">{{ __('messages.home') }}</a>
                        </li>
                        <li class="noActive {{ request()->is('category/*') ? 'sale-noti' : '' }}">
                            <a href="javascript:void(0)">{{ __('messages.categories') }}</a>
                            @if(isset($cates))
                                {{ subMenu($cates, 0) }}
                            @endif
                        </li>
                        <li class="noActive {{ request()->is('cart.html') ? 'sale-noti' : '' }}"><a
                                    href="{{route('endUser.cart.index')}}">{{ __('messages.cart') }}</a></li>
                        {{--<li><a href="{{route('endUser.sale.index')}}">{{ __('messages.sale') }}</a></li>--}}
                        {{--<li class="noActive  {{ request()->is('blog.html') ? 'sale-noti' : '' }}"><a
                                    href="{{route('endUser.blog.index')}}">{{ __('messages.blog') }}</a></li>--}}
                        {{--<li class="noActive {{ request()->is('about.html') ? 'sale-noti' : '' }}"><a
                                    href="{{route('endUser.about.index')}}">{{ __('messages.about') }}</a></li>--}}
                        <li class="noActive {{ request()->is('contact.html') ? 'sale-noti' : '' }}"><a
                                    href="{{route('endUser.contact.index')}}">{{ __('messages.contact') }}</a></li>
                    </ul>
                </nav>
            </div>

            <div class="topbar-social" style="display: none;">
                <a href="#" class="topbar-social-item fa fa-search searchAll"></a>
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <div class="header-wrapicon2">
                    <img src="{{asset('endUser/images/icons/icon-header-02.png')}}"
                         class="header-icon1 js-show-header-dropdown"
                         alt="ICON">
                    <span class="header-icons-noti cart-count">{{$cartCount}}</span>
                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        @if(isset($carts) && count($carts) > 0)
                            <ul class="header-cart-wrapitem">
                                @foreach($carts as $cart)
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img del-item" data-id="{{$cart->rowId}}"
                                             data-url="{{route('endUser.cart.destroy')}}">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $cart->options->image))
                                                <img src="{{PATH_IMAGE_MASTER. $cart->options->image}}"
                                                     alt="{{$cart->name ? $cart->name : ''}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="{{route('endUser.product.detail',['id'=> $cart->id, 'slug'=> $cart->options->slug])}}"
                                               class="header-cart-item-name">{{$cart->name}}</a>
                                            <span class="header-cart-item-info"><span>{{$cart->qty}}</span> x {{MONEY}}{{number_format($cart->price, 0)}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="header-cart-total">
                                {{ __('messages.title_total') }}: {{MONEY}}<span>{{$total}}</span>
                            </div>
                        @endif
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('endUser.cart.index')}}"
                                   class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">{{ __('messages.btn_view_cart') }}</a>
                            </div>
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('endUser.order.index')}}"
                                   class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">{{ __('messages.btn_check_out') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="/" class="logo-mobile">
            <img src="{{asset('endUser/images/icons/logoAmthy.png')}}" alt="IMG-LOGO"/>
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <div class="header-wrapicon2">
                    <img src="{{asset('endUser/images/icons/icon-header-02.png')}}"
                         class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti cart-count">{{$cartCount}}</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        @if(isset($carts) && count($carts) > 0)
                            <ul class="header-cart-wrapitem">
                                @foreach($carts as $cart)
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img del-item"
                                             data-id="{{$cart->rowId}}" data-url="{{route('endUser.cart.destroy')}}">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $cart->options->image))
                                                <img src="{{PATH_IMAGE_MASTER. $cart->options->image}}"
                                                     alt="{{$cart->name ? $cart->name : ''}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="{{route('endUser.product.detail',['id'=> $cart->id, 'slug'=> $cart->options->slug])}}"
                                               class="header-cart-item-name">{{$cart->name}}</a>
                                            <span class="header-cart-item-info"><span>{{$cart->qty}}</span> x {{MONEY}}{{number_format($cart->price, 0)}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="header-cart-total">
                                {{ __('messages.title_total') }}: {{MONEY}}<span>{{$total}}</span>
                            </div>
                        @endif

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('endUser.cart.index')}}"
                                   class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 cart-medium">{{ __('messages.btn_view_cart') }}</a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('endUser.order.index')}}"
                                   class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 cart-medium">{{ __('messages.btn_check_out') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
                        <div class="topbar-language rs1-select2">
                            <select class="selection-1" name="time">
                                <option>{{ __('messages.vietnamese') }}</option>
                                <option>{{ __('messages.english') }}</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-search searchAll"></a>
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile"><a href="/">{{ __('messages.home') }}</a></li>
                <li class="item-menu-mobile sale-noti">
                    <a href="javascript:void(0)">{{ __('messages.categories') }}</a>
                    @if(isset($cates))
                        {{ subMenuMobile($cates, 0) }}
                    @endif
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>
                <li class="item-menu-mobile"><a href="{{route('endUser.cart.index')}}">{{ __('messages.cart') }}</a>
                </li>
                {{--<li class="item-menu-mobile"><a href="{{route('endUser.sale.index')}}">{{ __('messages.sale') }}</a></li>--}}
                {{--<li class="item-menu-mobile"><a href="{{route('endUser.blog.index')}}">{{ __('messages.blog') }}</a></li>--}}
                {{--<li class="item-menu-mobile"><a href="{{route('endUser.about.index')}}">{{ __('messages.about') }}</a></li>--}}
                <li class="item-menu-mobile"><a
                            href="{{route('endUser.contact.index')}}">{{ __('messages.contact') }}</a></li>
            </ul>
        </nav>
    </div>
</header>