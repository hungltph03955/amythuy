<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">

            @if(isset($imagesBanner))
                @foreach($imagesBanner as $imagesBannerItem)
                    <div class="item-slick1 item1-slick1"
                         style="background-image: url({{asset(PATH_IMAGE_BANNER. $imagesBannerItem->img)}});">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m sliderfix">
                            <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                                data-appear="fadeInUp">
                            </h2>
                            <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                                <!-- Button -->
                                <a href="product.html" class="flex-c-m size2 bo-rad-2 s-text2 bgwhite hov1 trans-0-4">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>