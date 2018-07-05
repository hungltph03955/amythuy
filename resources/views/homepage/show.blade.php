@extends('templates.detail')

@push('scripts')
<script>
	 $(document).ready(function() {
	 	$('#button_cart').on('click',function(){
	 		var product_id 	= $(this).data('id');
	 		var name = $('#name').val();
	 		var price= $('#price').val();
	 		var quantity = $( "input[name='quantity']" ).val();
	 		 $.ajax({
	 		 	 headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
	            method: "POST",
	            url:  "{{route('home.cart')}}/"+product_id,
	            data: {
	            	id: product_id,
	            	name: name,
	            	price:price,
	            	qty:quantity,
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
@endpush