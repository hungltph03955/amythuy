<div data-widget-id="wid__store_product_grid__5a780872d760f" class="moto-widget moto-widget-store-product-grid moto-preset-default moto-align-center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto " data-widget="store_product_grid" data-preset="default">
	<div class="row">
		<div class="col-md-12" id="product_list">
			@if(empty($products) < 0)
			<p>Dữ liệu chưa được cập nhật !</p>
			@else
			@foreach($products as $product)
			<div class="col-md-3">
				<div class="moto-widget-store-main_item moto-widget-store-image-block ">
					<div class="moto-widget moto-widget-image moto-preset-5">
						<a class="moto-widget-image-link link_pro"  data-id="{{$product['id']}}" href="{{route('endUser.product.detail',['id'=> $product['id']])}}">
							<img data-src="{{url($product->img)}}" height="250" width="250" class="moto-widget-image-picture lazyload">						</a>
						</div>
						<a href="{{route('endUser.product.detail',['id'=> $product['id']])}}" class="moto-widget-store-main_item-title ">
							<span class="moto-text_220">{{$product['name']}}</span>
						</a>
						<div class="store-product-element-container">
							<div class="moto-widget-store-main_item-price">
								<span class="moto-text_221">{{number_format($product['price'])}}</span>
							</div>
						</div>
						<div class="store-product-element-container moto-widget-button moto-preset-2" data-store-product-add-to-cart="" data-product-id="43" data-location="/store/cart/" data-autoredirect="1">
							<a  class="moto-widget-button-link moto-size-large" >
								<span class="fa moto-widget-theme-icon"></span>
								<input type="hidden" name="name" id="name{{ $product->id }}" value="{{ $product->name }}">
								<input type="hidden" name="price" id="price{{ $product->id }}" value="{{ $product->price }}">
								<span class="moto-widget-button-label button_cart" value="" data-id="{{$product['id']}}" >THÊM VÀO GIỎ HÀNG</span>
							</a>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>
		</div>
		<div class="col-md-2 col-md-offset-2"></div>
		{{$products->links()}}
	</div>
