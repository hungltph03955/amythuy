<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-child2">
					<span class="topbar-email">
					</span>
                <div class="topbar-language rs1-select2">
                    <select class="selection-1" name="time">
                        <option>English</option>
                        <option>Vietnamese</option>
                    </select>
                </div>
            </div>
            <div class="topbar-child1">
                <a href="index.html" class="logo">
                    <img src="{{asset('endUser/images/icons/logoAmthy.png')}}" alt="IMG-LOGO"/>
                </a>
            </div>
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="sale-noti">
                            <a href="javascript:void(0)">Categories</a>
                            @if(isset($cates))
                                <ul class="sub_menu">
                                    @foreach($cates as $cate )
                                        <li><a href="{{route('endUser.contact.index')}}">{{$cate->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>

                        <li>
                            <a href="{{route('endUser.cart.index')}}">Cart</a>
                        </li>

                        <li>
                            <a href="{{route('sale.index')}}">Sale</a>
                        </li>
                        <li>
                            <a href="{{route('endUser.blog.index')}}">Blog</a>
                        </li>

                        <li>
                            <a href="{{route('endUser.about.index')}}">About</a>
                        </li>

                        <li>
                            <a href="{{route('endUser.contact.index')}}">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <div class="header-wrapicon2">
                    <img src="{{asset('endUser/images/icons/icon-header-02.png')}}"
                         class="header-icon1 js-show-header-dropdown"
                         alt="ICON">
                    <span class="header-icons-noti cart-count">{{count($carts)}}</span>
                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        @if(isset($carts) && count($carts) > 0)
                            <ul class="header-cart-wrapitem">
                                @foreach($carts as $cart)
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img del-item" data-id="{{$cart->rowId}}" data-url="{{route('endUser.cart.destroy')}}">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $cart->options->image))
                                                <img src="{{PATH_IMAGE_MASTER. $cart->options->image}}"
                                                    alt="{{$cart->name ? $cart->name : ''}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="#" class="header-cart-item-name">{{$cart->name}}</a>
                                            <span class="header-cart-item-info">{{$cart->qty}} x {{ MONEY }}{{number_format($cart->price, 0)}}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="header-cart-total">
                                Total: {{MONEY}}<span>{{$total}}</span>
                            </div>
                        @endif
                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('endUser.cart.index')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
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
        <a href="index.html" class="logo-mobile">
            <img src="{{asset('endUser/images/icons/logoAmthy.png')}}" alt="IMG-LOGO"/>
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="{{asset('endUser/images/icons/icon-header-02.png')}}"
                         class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti cart-count">{{count($carts)}}</span>

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
                                        <a href="#" class="header-cart-item-name">{{$cart->name}}</a>
                                        <span class="header-cart-item-info">{{$cart->qty}} x {{ MONEY }}{{number_format($cart->price, 0)}}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="header-cart-total">
                                Total: {{MONEY}}<span>{{$total}}</span>
                            </div>
                        @endif

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="{{route('endUser.cart.index')}}" 
                                    class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">View Cart</a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
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
                                <option>English</option>
                                <option>Vietnamese</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile"><a href="/">Home</a></li>
                <li class="item-menu-mobile sale-noti">
                    <a href="javascript:void(0)">Categories</a>
                        @if(isset($cates))
                            <ul class="sub-menu">
                                @foreach($cates as $cate )
                                    <li><a href="{{route('endUser.cart.index',['slug', $cate->slug])}}">{{$cate->name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>
                <li class="item-menu-mobile"><a href="{{route('endUser.cart.index')}}">Cart</a></li>
                <li class="item-menu-mobile"><a href="{{route('endUser.sale.index')}}">Sale</a></li>
                <li class="item-menu-mobile"><a href="{{route('endUser.blog.index')}}">Blog</a></li>
                <li class="item-menu-mobile"><a href="{{route('endUser.about.index')}}">About</a></li>
                <li class="item-menu-mobile"><a href="{{route('endUser.contact.index')}}">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>