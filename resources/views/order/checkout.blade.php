@extends('templates.homepage')
@push('styles')
<style>
	label{
		color:white;
	}
</style>
@endpush
@section('content')
<div class="moto-widget moto-widget-row row-fixed moto-spacing-top-large moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto" data-widget="row" style="" data-spacing="lala">
	<div class="container-fluid">
		<div class="row" data-container="container">
			<div class="moto-cell col-sm-12 moto-widget moto-widget-row__column" data-container="container" data-widget="row.column">
				<div data-widget-id="wid__store_checkout__5a8e227f17124" class="moto-widget moto-widget-store_checkout moto-preset-default  moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-preset="default" data-widget="store_checkout">
					<section id="section-content" class="content page- moto-section" data-widget="section" data-container="section">
						<div class="row-fixed">
							<div class="container-fluid">
								<div class="row">
									<div class="col-sm-12">
										<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-bottom-medium">
											<p class="moto-text_system_8" style="text-align: center;">
												CHECKOUT
											</p>
										</div>
										<div class="col-sm-6">
											<div class="moto-widget-store-checkout-step">
												<div class="moto-widget-store-checkout-step-title active">
													<span class="">
														THÔNG TIN KHÁCH HÀNG
													</span>
												</div>
												<div class="moto-widget-store-checkout-step-content active">
													<div class="row">
														<div class="col-sm-12">
															<div class="moto-widget-contact_form moto-preset-3">
																<form method="POST" action="{{route('order.infoCus')}}" class="moto-widget-contact_form-form  moto-widget-store-checkout-form ng-pristine ng-valid">
																	{!! csrf_field() !!}
																	<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-bottom-medium">
																	</div>
																	
																	<div class="moto-widget-contact_form-group">
																		<label for="">Email</label>
																		<input name="email" type="text" class="moto-widget-contact_form-field moto-widget-contact_form-input" value="{{ Auth::check() ? Auth::user()->email :'' }}" placeholder="Email Address">
																	</div>
																	<div class="moto-widget-contact_form-group">
																		<label for="">Tên</label>
																		<input name="name" type="text" class="moto-widget-contact_form-field moto-widget-contact_form-input" value="{{ Auth::check() ? Auth::user()->name :'' }}" placeholder="Họ và tên">
																	</div>
																	<div class="moto-widget-contact_form-group">
																		<label for="">Mật khẩu đăng nhập</label>
																		<input name="password" type="password" class="moto-widget-contact_form-field moto-widget-contact_form-input" value="{{ Auth::check() ? Auth::user()->name :'' }}" placeholder="">
																	</div>
																	<div class="moto-widget-contact_form-group">
																		<label for="">Tỉnh/Thành phố</label>
																		<input name="province" type="text" class="moto-widget-contact_form-field moto-widget-contact_form-input" value="" placeholder="City">
																	</div>
																	<div class="moto-widget-contact_form-group">
																		<label for="">Địa chỉ</label>
																		<input name="address" type="text" class="moto-widget-contact_form-field moto-widget-contact_form-input" value="{{ Auth::check() ? Auth::user()->address :'' }}" placeholder="Address">
																	</div>
																	<div class="moto-widget-contact_form-group">
																		<label for="">Điện thoại di động</label>
																		<input name="phone" type="text" class="moto-widget-contact_form-field moto-widget-contact_form-input" value="{{ Auth::check() ? Auth::user()->phone :'' }}" placeholder="Contact Phone">
																	</div>
																	<div class="moto-widget-contact_form-buttons">
																		<div class="moto-widget moto-widget-button moto-preset-default">
																			<button type="submit" class="moto-widget-button-link moto-size-medium">
																				<span class="fa moto-widget-theme-icon"></span>
																				<span class="moto-widget-button-label">CONTINUE</span>
																			</button>
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="moto-widget-store-checkout-step">
												<div class="moto-widget-store-checkout-step-title active">
													<span class="">
														THÔNG TIN ĐƠN HÀNG
													</span>
												</div>
												<div class="moto-widget-store-checkout-step-content active">
													<div class="row">
														<div class="moto-widget-store-checkout-step-content active">
															<form action="" method="post" class="moto-widget-store-checkout-form ng-pristine ng-valid">
																
																<div class="moto-widget-store-confirmation moto-widget-store-confirmation-checkout moto-widget-store-confirmation-pc">
																	<ul class="moto-widget-store-confirmation-pc-ul_title moto-text_system_10">
																		<li></li>
																		<li>NAME</li>
																		<li>PRICE</li>
																		<li>QUANTITY</li>
																		<li>TOTAL PRICE</li>
																	</ul>
																	@foreach(Cart::content() as $row)
																	<ul>
																		<li class="moto-widget-store-confirmation-pc-image">
																			<div class="moto-widget moto-widget-image moto-preset-default">
																				<a href="/show/{{$row->id}}" class="moto-widget-image-link">
																					<img src={{$row->options->image}} class="moto-widget-image-picture">
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
																			{{$row->qty}}
																		</li>
																		<li class="moto-widget-store-confirmation-pc-total_price moto-text_normal">
																			{{$row->subtotal()}}
																		</li>
																	</ul>
																	@endforeach
																</div>
																<div class="container-fluid">
																	<div class="row moto-widget-store-confirmation-total-wrap">
																		<div class="col-sm-6 moto-widget-store-confirmation-payment_method">
																			<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-bottom-medium">
																					<div class="moto-text_system_13 ">Tổng tiền: {{Cart::subtotal()}} </div>
																			</div>
																		</div>
																	</div>
																</div>
														</form>
													</div>                                                 >
												</div>
											</div>
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
@endsection