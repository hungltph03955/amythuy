<div class="col-md-12" id="product_list">
	@if(empty($products) < 0)
	<p>Dữ liệu chưa được cập nhật !</p>
	@else
	@foreach($products as $product)
	<div class="col-md-3">
		<div class="moto-widget-store-main_item moto-widget-store-image-block ">
			<div class="moto-widget moto-widget-image moto-preset-5">
				<a class="moto-widget-image-link link_pro"  data-id="{{$product['id']}}" href="{{route('endUser.product.detail',['id'=> $product['id']])}}">
					<img data-src="{{url($product->img)}}" class="moto-widget-image-picture lazyload">						</a>
				</div>
				<a href="https://template65055.motopreview.com/store/product/marinated-oysters/" class="moto-widget-store-main_item-title ">
					<span class="moto-text_220">{{$product['name']}}</span>
				</a>
				<div class="store-product-element-container">
					<div class="moto-widget-store-main_item-price">
						<span class="moto-text_221">{{$product['price']}}</span>
					</div>
				</div>
				<div class="store-product-element-container moto-widget-button moto-preset-2" data-store-product-add-to-cart="" data-product-id="43" data-location="/store/cart/" data-autoredirect="1">
					<a  class="moto-widget-button-link moto-size-large" >
						<span class="fa moto-widget-theme-icon"></span>
						<input type="hidden" name="name" id="name{{ $product->id }}" value="{{ $product->name }}">
						<input type="hidden" name="price" id="price{{ $product->id }}" value="{{ $product->price }}">
						<span class="moto-widget-button-label button_cart"  value="" data-id="{{$product['id']}}" >ADD TO CART</span>
					</a>
				</div>
			</div>
		</div>
		@endforeach
		@endif
	</div>
</div>
<script>
	 $(document).ready(function() {
	 	$('.button_cart').on('click',function(){
	 		var product_id 	= $(this).data('id');
	 		var name = $('#name'+product_id).val();
	 		var price= $('#price'+product_id).val();
	 		
	 		$.ajax({
	 		 	 headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
	            method: "POST",
	            url:  "{{route('home.cart')}}/"+product_id,
	            data: {
	            	id: product_id,
	            	name: name,
	            	price:price
	            },
	            dataType:'json',
	            success: function (data) {
	           	$('#cart').text(data['count']);

	            },
	            error: function (data) {
	            console.log('Error:', data);
	            }
        	});
	 	});
    });
</script>
