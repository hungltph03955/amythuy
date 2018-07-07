/*
 * ---------------------------------------------------
 * 1. Cart Manager
 */
(function ($) {
    "use strict";

    /*[ 1. Cart ajax ]
    ===========================================================*/
    $('.btn-addcart-product').click(function () {
        var productId = $(this).data('id');
        var options = {quantity: $('input[name="num-product"]').val()};
        addToCart(productId, options);
    });

    $('del_item').on('click', '.del_item', function () {
        if (confirm('Are you Ok?')) {
            var id = $(this).data('id');
            $(this).parents('.tr-wrap').remove();
            update_product_quantity(id, 0, 'ajax');
        }
    });
})(jQuery);

addToCart = (productId, options) => {
    console.log(options);
       $.ajax({
           url: $('#route-add-to-cart').val(),
           method: "POST",
           data : {
               id: productId,
               options : options
            },
            success : function(data){
                $('.cart-count').html(data);
            }
        });
}
updateCart = (id, quantity, type) => {
    $.ajax({
        url: $('#route-update-product').val(),
        method: "POST",
        data: {
            id: id,
            quantity: quantity
        },
        success: function (data) {

        }
    });
}