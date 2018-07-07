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
        var options = { quantity: $('input[name="num-product"]').val() };
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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/addCart',
        method: "POST",
        data: {
            id: productId,
            options: options
        },
        success: function (data) {
            console.log(data);
            $('.cart-count').html(data.count);
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