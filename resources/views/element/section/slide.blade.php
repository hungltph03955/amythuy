<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">

            @if(isset($imagesBanner))
                @foreach($imagesBanner as $imagesBannerItem)
                    <div class="item-slick1 item1-slick1"
                         style="background-image: url({{asset(PATH_IMAGE_BANNER. $imagesBannerItem->img)}});">
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>