@extends('templates.homepage')

@section('content')

<section id="section-content" class="content page-11 moto-section" data-widget="section" data-container="section">
	<div class="moto-widget moto-widget-row row-fixed moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto" data-widget="row" style="" data-spacing="lala">
		<div class="container-fluid">
			<div class="row" data-container="container">
				<div class="moto-cell col-sm-12 moto-widget moto-widget-row__column" data-container="container" data-widget="row.column">
					<div data-widget-id="wid__store_cart__5a7cfb2570a95" class="moto-widget moto-widget-store_cart moto-preset-default  moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-preset="default" data-widget="store_cart">
						<section id="section-content" class="content page- moto-section" data-widget="section" data-container="section">
							<div class="moto-widget moto-widget-container">
								<div class="row-fixed">
									<div class="container-fluid">
										<div class="row">
											<div class="col-sm-12">
												<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-bottom-small moto-text_system_8">
													<p style="text-align: center;">
														SHOPPING CART
													</p>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="moto-widget-store-confirmation moto-widget-store-confirmation-shp_cart moto-widget-store-confirmation-pc">
													<ul class="moto-widget-store-confirmation-pc-ul_title moto-text_system_10" id="table_product">
														<li>IMAGE</li>
														<li>NAME</li>
														<li>PRICE</li>
														<li>QUANTITY</li>
														<li></li>
														<li>TOTAL PRICE</li>
													</ul>
													@foreach(Cart::content() as $row)
													<ul id="product{{$row->rowId}}">
														<li class="moto-widget-store-confirmation-pc-image">
															<div class="moto-widget moto-widget-image moto-preset-default">
																<a href="/store/product/kebab/" class="moto-widget-image-link">
																	<img src="{{$row->options->has('image')?$row->options->image:''}}" alt="" width="100">
																</a>
															</div>
														</li>
														<li class="moto-widget-store-confirmation-pc-name moto-text_normal">
															{{$row->name}}
														</li>
														<li class="moto-widget-store-confirmation-pc-price moto-text_normal">
															{{$row->price}}
														</li>
														<li class="moto-widget-store-confirmation-pc-quantity moto-text_normal">
															<span class="moto-widget-store-spinner-wrap">
																<input required="" type="number" min="1" data-store-cart-unit-quantity="" data-product-id="37_0" class="moto-widget-store-spinner moto-widget-store-spinner-type_1" value="{{$row->qty}}" data-id="{{$row->rowId}}">
															</span>
														</li>
														<li>
															<div class="moto-widget moto-widget-button moto-preset-default">
																<a name="remove"  data-id="{{$row->rowId}}"   class="moto-widget-button-link moto-size-medium remove_item">
																	<span class="fa moto-widget-theme-icon"></span>
																	<span class="moto-widget-button-label">REMOVE</span>
																</a>
															</div>
														</li>
														<li class="moto-widget-store-confirmation-pc-total_price moto-text_normal" >
															<p id="total{{$row->rowId}}">{{$row->subtotal()}}</p>
														</li>
													</ul>
													@endforeach
												</div>
												<form action="" name="storeCartHelperForm" method="post" class="moto-widget-store-checkout-form ng-pristine ng-valid">
													<div class="container-fluid">
														<div class="row moto-widget-store-confirmation-total-wrap">
															<div class="col-sm-5 moto-widget-store-confirmation-payment_method moto-widget-store-confirmation-payment_method-margin_bottom">
																<div data-store-discount="" data-entered-discount="" class="moto-widget-store-shp_cart-form">
																	<textarea name="comment" rows="5" class="moto-widget-store-shp_cart-form-textarea" placeholder="Comment"></textarea>

																	<div class="moto-widget moto-widget-button moto-preset-default">
																		<a href="#" class="moto-widget-button-link moto-size-medium moto-widget-store-shp_cart-toggle_discount">
																			<span class="fa moto-widget-theme-icon"></span>
																			<span class="moto-widget-button-label">
																				DISCOUNT CODE
																			</span>
																		</a>
																	</div>
																	<div class="moto-widget-store-shp_cart-discount ">
																		<input ng-model="discount_code" type="text" placeholder="YOURPROMOCODE" class="moto-widget-store-shp_cart-form-input ng-pristine ng-untouched ng-valid ng-empty">
																		<div class="moto-widget moto-widget-button moto-preset-default moto-align-right">
																			<a ng-click="applyDiscount ()" href="#" class="moto-widget-button-link moto-size-medium">
																				<span class="fa moto-widget-theme-icon"></span>
																				<span class="moto-widget-button-label">APPLY</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-sm-7 moto-widget-store-confirmation-total">
																<div class="moto-text_system_13 subtotal">Thành tiền: {{Cart::subtotal()}}</div>
																<div class="moto-text_system_13 ">Total: </div>
																<div class="moto-widget-store-shp_cart-btns">
																	<div class="moto-widget moto-widget-button moto-preset-default">
																		<a href="{{route('homepage.index')}}" class="moto-widget-button-link moto-size-medium">
																			<span class="fa moto-widget-theme-icon"></span>
																			<span class="moto-widget-button-label">BACK TO SHOP</span>
																		</a>
																	</div>
																	<div class="moto-widget moto-widget-button moto-preset-default">
																		<a href="{{route('order.checkout')}}" class="moto-widget-button-link moto-size-medium">
																			<span class="fa moto-widget-theme-icon"></span>
																			<span class="moto-widget-button-label">CHECKOUT</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</form>                                 
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
@push('scripts')
<script>
	$(function(){
		$("input[type=number]").bind('keyup input', function(){
    		var qty = $(this).val();
    		var product_id = $(this).data('id');
    		var url ="{{route('home.cart.update')}}/"+product_id;
    		$.ajaxSetup({
    			beforeSend: function(xhr, type) {
    				if (!type.crossDomain) {
    					xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    				}
    			},
    		});
    		$.post(url ,{qty:qty},function(data,status){
    			if(status === 'success'){
    				 $("#total"+data['product'].rowId).html("<p>"+data.subtotalID+"</p>");
    				 $('.subtotal').html(data.subtotal)
    			}
    		});
		});
		$('a[name=remove]').on('click',function(){
			var rowId = $(this).data('id');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				method:"POST",
				url:"{{route('home.cart.destroy')}}/"+ rowId,
				data:{id:rowId},
				dataType:'json',
				success:function(data , status){
					if(status)
					$('#product'+rowId).remove();
					$("#table_product").load();
				}
			});

		});

	});
</script>
@endpush