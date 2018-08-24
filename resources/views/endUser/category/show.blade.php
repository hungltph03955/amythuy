@extends('layouts.endUser.homepage')
@section('title'){{$category->name}}@endsection
@push('styles')
@endpush
@section('content')
    <?php
    if (isset($category->img) && file_exists(public_path() . PATH_IMAGE_CATEGORY . $category->img)):
        $imgCat = PATH_IMAGE_CATEGORY . $category->img;
    else:
        $imgCat = asset('endUser/images/find-a-stylist.jpg');
    endif
    ?>
    <!-- Title Page -->
    @include('element.section.title', [
        'titleCat' => $category->name,
        'descriptionCat' => $category->description,
        'imgCat' => $imgCat])
    <section class="p-t-20 p-b-40 flex-col-c-m Women-gach">
        <div class="Women-gach-float">
            <h2 class="l-text2 t-center">
                {{$category->name}}
            </h2>
        </div>
    </section>

    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <!--Filter-->
                    <form action="{{action('EndUser\CategoryController@show', $slug)}}" method="get"
                          class="form-inline frm-search-category">
                        <select name="category" id="select_category" style="display: none;">
                            <option value="0">Category</option>
                            @if(isset($categoryChiled))
                                @foreach($categoryChiled as $categoryChiledItem)
                                    <option value="{{ $categoryChiledItem->id }}" {{ $searchCategory == $categoryChiledItem->id ? 'selected="selected"' : '' }}>{{ $categoryChiledItem->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="p-b-30">
                            @if(isset($categoryChiled))
                                @foreach($categoryChiled as $categoryChiledItem)
                                    <button type="button" class="btn-category"
                                            onclick="onSearchCategory({{$categoryChiledItem->id}})">{{ $categoryChiledItem->name }}
                                        <span class="{{ $searchCategory == $categoryChiledItem->id ? 'active' : 'not-active' }}"></span>
                                    </button>
                                @endforeach
                            @endif
                        </div>
                    </form>
                    <!-- Product -->
                    <div class="row">
                        @if(!$products->isEmpty())
                            @foreach($products as $product)
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-img hov-img-zoom wrap-pic-w of-hidden pos-relative parent-hover-img">
                                            <a href="{{route('endUser.product.detail',['id'=> $product->id, 'slug'=> $product->slug])}}">
                                                @if(file_exists( public_path().PATH_IMAGE_MASTER. $product->img))
                                                    <img src="{{PATH_IMAGE_MASTER. $product->img}}"
                                                         alt="{{$product->name ? $product->name : ''}}"
                                                         class="img-product-first">
                                                @else
                                                    <img src="{{PATH_NO_IMAGE}}" class="img-product-first">
                                                @endif
                                                @if(!$product->photo->isEmpty())
                                                    @if(file_exists( public_path().PATH_IMAGE_DETAIL. $product->photo[0]['name']))
                                                        <img src="{{PATH_IMAGE_DETAIL. $product->photo[0]['name']}}"
                                                             alt="{{$product->name ? $product->name : ''}}"
                                                             class="hover-img">
                                                    @endif
                                                @endif
                                            </a>
                                            <!-- <div class="block2-overlay trans-0-4"> -->
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <a href="{{route('endUser.product.detail',['id'=> $product->id, 'slug'=> $product->slug])}}"
                                                   class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">{{ __('messages.btn_view_more') }}</a>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="pagination flex-m flex-w p-t-26">
                        <div class="pagination-center endUserCategory">
                            {{$products->appends([
                                'category'=> $searchCategory,
                                'color'=> $searchColorProduct,
                                'size'=> $searchSizeProduct,
                                'collection'=> $searchCollectionProduct,
                                'material'=> $searchMaterialProduct,
                                'price'=> $searchPriceProduct
                                 ])
                                 ->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection