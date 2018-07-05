@extends('templates.homepage')

@section('title')
HOME
@endsection

@push('styles')
<style>
.pagination>li>a, .pagination>li>span {
  color: #f1f1f1;
  float: left;
  width: 50px;
  height: 40px;
  line-height: 40px;
  margin-left: 10px;
}

.pagination>li>a:hover, .pagination>li>a:focus {
  background: #ce3434;
  color: #333;
  text-decoration: none;
  color: #fff;
  display: block;
}
.pagination{
  background: rgba(30, 30, 30, 0.8);
  list-style-type: none;
  overflow: hidden;
  width: 30%;
  margin-left: 10px;
}
.col-sm-offset-2 {
    margin-top: -43px;
    float: right;
}
</style>
@endpush

@section('content')
	<section id="section-content" class="content page-9 moto-section" data-widget="			section" data-container="section">
		<div class="moto-widget moto-widget-container moto-container_content_59dbddd43" 	data-widget="container" data-container="container" data-css-name="				moto-container_content_59dbddd43">
		@include('include.homepages.slider_list')
		<!-- sileder -->
		<div class="moto-widget moto-widget-container moto-container_content_59dbe0e76" data-widget="container" data-container="container" data-css-name="moto-container_content_59dbe0e76">
		<div class="moto-widget moto-widget-row row-fixed moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto" data-grid-type="sm" data-widget="row" data-spacing="aasa" style="">
			<div class="container-fluid">
				<div class="row" data-container="container">
					<div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
						<div data-widget-id="wid__divider_horizontal__5a780872c823c" class="moto-widget moto-widget-divider moto-preset-default moto-align-left moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-small moto-spacing-left-auto  " data-widget="divider_horizontal" data-preset="default">
							<hr class="moto-widget-divider-line" style="max-width:100%;width:8%;">
						</div>
							<div class="moto-widget-text-content moto-widget-text-editable">
								<p class="moto-text_system_13">PRODUCTS</p><br>
								<div class="col-sm-3 col-sm-offset-2">
									<form method="POST" >
										<label for=""><strong style="color: white">Sort by </strong></label>
										<select name="order_by" onchange="sort_pro(this.value)" class="form-control">
											<option  value="price_asc">Price: Low to High</option>
											<option  value="price_desc">Price: High to Low</option>
											<option  value="date_asc">Oldest First</option>
											<option  value="date_desc">Newest First</option>
										</select>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>    
		<div class="moto-widget moto-widget-row row-fixed moto-spacing-top-medium 			moto-spacing-right-auto moto-spacing-bottom-large moto-spacing-left-auto"	    data-grid-type="sm" data-widget="row" data-spacing="mala" style=""           data-draggable-disabled="">
			<div class="container-fluid">
				<div class="row" data-container="container">
					<div class="moto-widget moto-widget-row__column moto-cell col-sm-12 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa">
						@include('include.homepages.product_list')
						@include('include.homepages.deal_day')
					</div>
				</div>
			</div>
		</div>
		@include('include.homepages.contact')
	</section>
@endsection
@push('scripts')
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
	function sort_pro(value){
		$.ajax({
			method:'GET',
			url:"{{url('questions')}}",
			data:{type:value},
			dataType:'json',
		}).done(function(data){
			console.log(data);
		  $('#product_list').html(data.html);
		});
	}
</script>

@endpush