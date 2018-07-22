<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            @if(isset($category))
                @foreach($category as $categoryItem)
                    <div class="col-sm-12 col-md-12 col-lg-12 m-l-r-auto">
                        <div class="item-slick2 item1-slick1"
                             style="background-image: url({{asset('endUser/images/ribbon-2929380_1920.png')}});">
                        </div>
                        <div class="divCtaterory-first">
                            <div class="wrap-btn-slide1 w-size1 animated divCtaterory-first-aLink"
                                 data-appear="rotateIn"
                                 style="width: 161px;">
                                <!-- Button -->
                                <a href="{{renderRoute($categoryItem)}}"
                                   class="flex-c-m size2 bo-rad-2 s-text2 bgwhite hov1 trans-0-4">{{ __('messages.btn_view_more') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            {{--<div class="row category-tow">--}}
            {{--<div class="col-sm-6 col-md-6 col-lg-6 m-l-r-auto category-tow-macgi-media">--}}
            {{--<!-- block1 -->--}}
            {{--<div class="block1 hov-img-zoom pos-relative m-b-30">--}}
            {{--<a href="#"><img src="{{asset('endUser/images/8.png')}}" alt="IMG-BENNER"></a>--}}
            {{--</div>--}}
            {{--<div class="w-size2 category-toww-size2">--}}
            {{--<!-- Button -->--}}
            {{--<a href="#"--}}
            {{--class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">{{ __('messages.btn_view_more') }}</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 col-md-6 col-lg-6 m-l-r-auto category-tow-macgi-media">--}}
            {{--<!-- block1 -->--}}
            {{--<div class="block1 hov-img-zoom pos-relative m-b-30">--}}
            {{--<a href=""><img src="{{asset('endUser/images/2.png')}}" alt="IMG-BENNER"></a>--}}
            {{--</div>--}}
            {{--<div class="w-size2 category-toww-size2">--}}
            {{--<!-- Button -->--}}
            {{--<a href="#"--}}
            {{--class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">{{ __('messages.btn_view_more') }}</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
</section>