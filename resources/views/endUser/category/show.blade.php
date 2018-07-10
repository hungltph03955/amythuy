@extends('layouts.endUser.homepage')
@section('title')
{{$category->name}}
@endsection
@push('styles')
@endpush
@section('content')
<?php 
    if(file_exists(public_path().PATH_IMAGE_CATEGORY. $category->img)):
        $imgCat = PATH_IMAGE_CATEGORY. $category->img;
    else:
        $imgCat = PATH_NO_IMAGE_CATEGORY;
    endif
?>
    <!-- Title Page -->
    @include('element.section.title', [
        'titleCat' => $category->name,
        'descriptionCat' => $category->description,
        'imgCat' => $imgCat])
    <section class="p-t-50 p-b-40 flex-col-c-m Women-gach">
        <div class="Women-gach-float">
            <h2 class="l-text2 t-center">
                {{$category->name}}
            </h2>
        </div>
        <div class="Women-gach-float">
            <p class="m-text13 t-center">
                ( {{ $countproducts }} product )
            </p>
        </div>
    </section>

    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <form action="{{action('EndUser\CategoryController@show', $slug)}}" method="get"
                              class="form-inline">
                            <div class="flex-w">
                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                    <select class="selection-2" name="category">
                                        <option value="0">Category</option>
                                        @if(isset($categoryChiled))
                                            @foreach($categoryChiled as $categoryChiledItem)
                                                <option value="{{ $categoryChiledItem->id }}" {{ $searchCategory == $categoryChiledItem->id ? 'selected="selected"' : '' }}>{{ $categoryChiledItem->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                    <select class="selection-2" name="color">
                                        <option value="0">Color</option>
                                        @if(isset($color))
                                            @foreach($color as $colorItem)
                                                <option value="{{ $colorItem['id'] }}" {{ $searchColorProduct == $colorItem['id'] ? 'selected="selected"' : '' }}>{{ $colorItem['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                    <select class="selection-2" name="size">
                                        <option value="0">Size</option>
                                        @if(isset($size))
                                            @foreach($size as $sizeItem)
                                                <option value="{{ $sizeItem['id'] }}" {{ $searchSizeProduct == $sizeItem['id'] ? 'selected="selected"' : '' }}>{{ $sizeItem['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                    <select class="selection-2" name="collection">
                                        <option value="0">Collection</option>
                                        @if(isset($collection))
                                            @foreach($collection as $collectionItem)
                                                <option value="{{ $collectionItem['id'] }}" {{ $searchCollectionProduct == $collectionItem['id'] ? 'selected="selected"' : '' }}>{{ $collectionItem['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search">
                                    <select class="selection-2" name="material">
                                        <option value="0">Material</option>
                                        @if(isset($material))
                                            @foreach($material as $materialItem)
                                                <option value="{{ $materialItem['id'] }}" {{ $searchMaterialProduct == $materialItem['id'] ? 'selected="selected"' : '' }}>{{ $materialItem['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10 select-search priceOptionCategory">
                                    <select class="selection-2" name="price">
                                        <option value="0">Price</option>
                                        <option value="1" {{ $searchPriceProduct == 1 ? 'selected="selected"' : '' }}>
                                            Price low to high
                                        </option>
                                        <option value="2" {{ $searchPriceProduct == 2 ? 'selected="selected"' : '' }}>
                                            Price high to low
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <span class="s-text8 p-t-5 p-b-5">
                            <div class="w-size2 filter-toww-size2">
                                <button href="#"
                                        class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4 btnFilter">Filter</button>
                            </div>
                        </span>
                        </form>
                    </div>
                    <!-- Product -->
                    <div class="row">
                        @if(isset($products))
                            @foreach($products as $product)
                                <div class="col-sm-6 col-md-6 col-lg-4 p-b-50">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-img wrap-pic-w of-hidden pos-relative {{renderClass($product->updated_at, NEW_DATE)}}">
                                            @if(file_exists( public_path().PATH_IMAGE_MASTER. $product->img))
                                                <img src="{{PATH_IMAGE_MASTER. $product->img}}"
                                                     alt="{{$product->name ? $product->name : ''}}">
                                            @else
                                                <img src="{{PATH_NO_IMAGE}}">
                                            @endif
                                            <div class="block2-overlay trans-0-4">
                                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                                    <!-- Button -->
                                                    <a href="{{route('endUser.product.detail',['id'=> $product->id, 'slug'=> $product->slug])}}"
                                                       class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                        view more
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block2-txt p-t-20">
                                            <a href="{{route('endUser.product.detail',['id'=> $product->id, 'slug'=> $product->slug])}}"
                                               class="block2-name dis-block s-text3 p-b-5 view-more-product">
                                                {{$product->name ? $product->name : ''}}
                                            </a>
                                            <span class="block2-price m-text6 p-r-5 textprice">
                                                {{MONEY}}{{number_format($product->price)  }}
                                            </span>
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