<section id="section-content" class="content page-11 moto-section" data-widget="section" data-container="section">
    <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
        data-grid-type="sm" data-widget="row" data-spacing="sasa" style="">
        <div class="container-fluid">
            <div class="row" data-container="container">
                <div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto"
                style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
                    <div data-widget-id="wid__store_breadcrumbs__5a7828ebe40e2"
                    class="moto-widget moto-widget-store-breadcrumbs moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"
                    data-widget="store_breadcrumbs">
                        <div class="container-fluid">
                            <div>
                                <ul>
                                    <li>
                                        <a href="">Home</a>
                                    </li>
                                    <li>
                                        <a href="/category/{{$product->category->slug}}">{{$product->category->name}}</a>
                                    </li>
                                    <li>
                                        <a href="/show/{{$product->id}}">{{$product->name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="moto-widget moto-widget-row row-fixed" data-widget="row">
        <div class="container-fluid">
            <div class="row" data-container="container">
                <div class="moto-cell col-sm-12 moto-widget moto-widget-row__column" data-container="container"
                data-widget="row.column">
                <div class="moto-widget moto-widget-container moto-container_content_56609e49"
                data-widget="container" data-container="container"
                data-css-name="moto-container_content_56609e49">
                <div class="moto-widget moto-widget-row" data-widget="row">
                    <div class="container-fluid">
                        <div class="row" data-container="container">
                            <div class="moto-cell col-sm-7 moto-widget moto-widget-row__column"
                            data-container="container" data-widget="row.column" style="">
                            <div data-widget-id="wid__store_product_media_gallery__5a7828ebe4fb7"
                            class="moto-widget moto-widget-store-product-media-gallery moto-preset-default moto-align-center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto "
                            data-widget="store_product_media_gallery" data-preset="default">
                            <div data-store-product-carousel=""
                            class="moto-widget-store-detail-col moto-widget-store-con_carousel">
                            <div class="connected-carousels">
                                <div class="stage">
                                    <div class="carousel carousel-stage"
                                    store-lightbox-gallery="">
                                    <ul>
                                        <li class="moto-widget-store-image-block">
                                            <div class="moto-widget moto-widget-image moto-preset-default">
                                                <a href="{{url('',$product['img'])}}"
                                                class="moto-widget-image-link">
                                                <img data-src="{{url('',$product['img'])}}"
                                                class="moto-widget-image-picture lazyload">
                                                </a>
                                            </div>
                                        </li>
                                        
                                        @for($i = 1; $i < sizeof($product->photo) ; $i++)
                                            <li data-image-id="1182"
                                            class="moto-widget-store-image-block">
                                                <div class="moto-widget moto-widget-image moto-preset-default">
                                                    <a class="moto-widget-image-link">
                                                        <img data-src="{{url('',$product->photo[$i]['name'])}}"
                                                        class="moto-widget-image-picture lazyload">
                                                    </a>
                                                </div>
                                            </li> 
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                            <div class="navigation-wrap">
                                <div class="navigation">
                                    <div class="nav-wrap">
                                        <a href="/store/product/marinated-oysters/#"
                                        class="prev prev-navigation"></a>
                                        <a href="/store/product/marinated-oysters/#"
                                        class="next next-navigation"></a>
                                    </div>
                                    <div class="carousel carousel-navigation">
                                        <ul>
                                         @foreach($product->photo as $slide)
                                            <li class="moto-widget-store-image-block">
                                                 <div class="moto-widget moto-widget-image moto-preset-default">
                                                    <a href="{{url('',$slide['name'])}}"
                                                     class="moto-widget-image-link">
                                                        <img data-src="{{url('',$slide['name'])}}"
                                                     class="moto-widget-image-picture lazyload">
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="moto-cell col-sm-5 moto-widget moto-widget-row__column"
            data-container="container" data-widget="row.column" style="">
            <div data-widget-id="wid__store_product_name__5a7828ebe5db2"
            class="moto-widget moto-widget-store-product-name moto-preset-default moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto "
            data-widget="store_product_name" data-preset="default">
            <div class="moto-widget-store-detail-top_descr">
                <div class="moto-widget-text-content moto-widget-text-editable">
                    <h2 class="moto-text_224">{{$product['name']}}</h2>
                </div>
            </div>
        </div>
        <div data-widget-id="wid__store_product_short_description__5a7828ebe62f1"
        class="moto-widget moto-widget-store-product-short-description moto-preset-default moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto "
        data-widget="store_product_short_description" data-preset="default">
        <div class="moto-widget-store-detail-text">
        </div>
    </div>
    <div data-widget-id="wid__store_product_price__5a7828ebe6ccb"
    class="moto-widget moto-widget-store-product-price moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto "
    data-widget="store_product_price" data-preset="default">
    <div data-store-product-price="" data-price="78.00"
    data-price-origin="$78.00">
    <div class="moto-widget-store-main_item-price">
        <h4 class="moto-text_227">{{$product['price']}} <small>VND</small> </h4>
    </div>
</div>
</div>
    <div data-widget-id="wid__store_product_options__5a7828ebe72d7"
    class="moto-widget moto-widget-store-product-options moto-preset-default moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto "
    data-widget="store_product_options" data-preset="default">
    <div class="moto-text_231">
        <product-options data-variant="variant" data-product-id="43">
        </product-options>
    </div>
    </div>
        <div data-widget-id="wid__store_product_quantity__5a7828ebe78bb"
        class="moto-widget moto-widget-store-product-quantity moto-preset-default moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto "
        data-widget="store_product_quantity" data-preset="default">
            <div class="moto-widget-store-detail-quantity"
            data-store-product-quantity="" data-tier-prices="[]">
                <span class="moto-text_231">QUANTITY</span>
                <span class="moto-widget-store-spinner-wrap moto-text_231"
                     style="margin-right: 20px; margin-bottom: 20px;">
                 <input ng-change="updateQuantity()" type="number" ng-model="quantity" id="quantity" name="quantity"
                 class="moto-widget-store-spinner moto-widget-store-spinner-type_1" min="1" required="">
                 </span>
            </div>
        </div>
        <div data-widget-id="wid__store_product_add_to_cart__5a7828ebe7fa1"
        class="moto-widget moto-widget-store-product-add-to-cart moto-preset-default moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto "
        data-widget="store_product_add_to_cart" data-preset="default">
            <div class="moto-widget-button moto-preset-5"
            data-store-product-add-to-cart="" data-product-id="43"
            data-location="/store/cart/" data-autoredirect="">
                <a href="" class="moto-widget-button-link  moto-size-large">
                    <span class="fa moto-widget-theme-icon"></span>
                    <input type="hidden" name="name" id="name" value="{{$product['name']}}">
                    <input type="hidden" name="price" id="price" value="{{$product['price']}}">
                    <span class="moto-widget-button-label" id="button_cart" data-id="{{$product['id']}}">ADD TO CART</span>
                </a>
            </div>
        </div>
    <div data-widget-id="wid__social_links__5a7828ebe84d1"
    class="moto-widget moto-widget-social-links moto-preset-default moto-align-left moto-spacing-top-small moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  "
    data-widget="social_links" data-preset="default">
    <ul class="moto-widget-social-links-list">
        <li class="moto-widget-social-links-item">
            <a href="http://demolink.motocms.com/"
            class="moto-widget-social-links-link moto-widget-social-links-link_twitter"
            data-provider="twitter" target="_blank"></a>
        </li>
        <li class="moto-widget-social-links-item">
            <a href="http://demolink.motocms.com/"
            class="moto-widget-social-links-link moto-widget-social-links-link_facebook"
            data-provider="facebook" target="_blank"></a>
        </li>
        <li class="moto-widget-social-links-item">
            <a href="http://demolink.motocms.com/"
            class="moto-widget-social-links-link moto-widget-social-links-link_linkedin"
            data-provider="linkedin" target="_blank"></a>
        </li>
        <li class="moto-widget-social-links-item">
            <a href="http://demolink.motocms.com/"
            class="moto-widget-social-links-link moto-widget-social-links-link_googleplus"
            data-provider="googleplus" target="_blank"></a>
        </li>
        <li class="moto-widget-social-links-item">
            <a href="http://demolink.motocms.com/"
            class="moto-widget-social-links-link moto-widget-social-links-link_pinterest"
            data-provider="pinterest" target="_blank"></a>
        </li>
    </ul>
    </div>


    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"
    data-widget="row" data-spacing="mala" style="">
    <div class="container-fluid">
        <div class="row" data-container="container">
            <div class="moto-cell col-sm-12 moto-widget moto-widget-row__column" data-container="container"
            data-widget="row.column" style="">
            <div class="moto-widget moto-widget-container moto-container_content_59dbdcfb2"
            data-widget="container" data-container="container"
            data-css-name="moto-container_content_59dbdcfb2">


            <div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto"
            data-widget="text" data-preset="default" data-spacing="aasa" data-animation="">
            <div class="moto-widget-text-content moto-widget-text-editable"><p
                class="moto-text_217">DETAILS</p></div>
            </div>
            <div data-widget-id="wid__store_product_description__5a7828ebe8a09"
            class="moto-widget moto-widget-store-product-description moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto "
            data-widget="store_product_description" data-preset="default">
            <div class="moto-widget-store-detail-text">
                {{--<p class="moto-text_normal"><strong>A salad is a dish consisting of a mixture of--}}
                    {{--small pieces of food, which may be mixed with a sauce or salad--}}
                {{--dressing.</strong>They are typically served cold, although some, such as south--}}
                {{--German potato salad, are served warm. Salads may contain vegetables, fruits,--}}
                {{--cheese, cooked meat, eggs, grains and nuts. Garden salads use a base of leafy--}}
                {{--greens like lettuce, arugula, kale or spinach; they are common enough that the--}}
                {{--word salad alone often refers specifically to garden salads. Other types include--}}
                {{--bean salad, tuna salad, fattoush, Greek salad, and Japanese sōmen salad (a--}}
                {{--noodle-based salad). The sauce used to flavor a salad is commonly called a salad--}}
                {{--dressing; well-known types include ranch, Thousand Island, and vinaigrette.--}}
                {{--Vinaigrette comes in many varieties; one version is a mixture of olive oil,--}}
            {{--balsamic vinegar, herbs, and seasonings.</p>--}}
                <p>{{$product->description}}</p>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>