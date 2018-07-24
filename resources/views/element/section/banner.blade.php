<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container-full">
        <div class="row categoryImage">
            @if(isset($category))
                @foreach($category as $categoryItem)
                    <div class="col-sm-12 col-md-12 col-lg-12 m-l-r-auto">
                        @if(file_exists( public_path().PATH_IMAGE_CATEGORY. $categoryItem->img))
                            <div class="item-category-home item1-slick1 hov-categoryItem-zoom"
                                 style="background-image: url({{asset(PATH_IMAGE_CATEGORY. $categoryItem->img)}});">
                            </div>
                        @endif

                        <div class="divCtaterory-first">
                            <div class="wrap-btn-slide1 w-size1 animated divCtaterory-first-aLink"
                                 data-appear="rotateIn"
                                 style="width: 161px;">
                                <!-- Button -->
                                <a href="{{renderRoute($categoryItem)}}"
                                   class="flex-c-m size2 bo-rad-2 s-text2 bgwhite hov1 trans-0-4 categoryItemText">{{ $categoryItem->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
</section>

