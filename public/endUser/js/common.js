/*
 * ---------------------------------------------------
 * 1. Cart Manager
 */
(function ($) {
    "use strict";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*[ 1. Cart ajax ]
    ===========================================================*/
    //Add cart
    $('.btn-addcart-product').click(function () {
        let productId = $(this).data('id');
        let options = {
            quantity: $('input[name="num-product"]').val(),
            size: $('select[name="size"]').val(),
            color: $('select[name="color"]').val(),
            material: $('select[name="material"]').val()
        }
        addToCart(productId, options);
    });
    //Update
    $('.cart-update').on('click', function (e) {
        let rowId = $(this).data('id');
        let urlUpdate = $(this).data('url');
        let quantity = $(this).parent().find('input[name="num-product1"]').val();
        if (confirm('Are you Ok?')) {
            updateCart(rowId, quantity, urlUpdate, $(this));
        }
        return
    });

    //Remove item
    $('.del-item').on('click', function () {
        if (confirm('Are you Ok?')) {
            let rowId = $(this).data('id');
            let urlDelete = $(this).data('url');
            $(".del-item").each(function() {
                console.log($(this));
                if($(this).data('id') === rowId){
                    $(this).parents('.table-row').remove();
                    $(this).parents('.header-cart-item').remove()
                }
            })
            updateCart(rowId, 0, urlDelete, $(this));
        }
        return
    });
})(jQuery);

addToCart = (productId, options) => {
    $.ajax({
        url: '/addCart',
        method: "POST",
        data: {
            id: productId,
            options: options
        },
        success: function (data) {
            onSetCart(data);
        }
    });
}

updateCart = (rowId, quantity, url, $this = null) => {
    $.ajax({
        url: url,
        method: "POST",
        data: {
            rowId: rowId,
            quantity: quantity
        },
        success: function (data) {
            onSetCart(data, $this);
        }
    });
}

onSetCart = (data, $this) => {
    // $('.update-cart').empty();
    if ($this !== null && typeof (data.subtotalId) !== 'undefined' && data.subtotalId !== '0') {
        $this.parent().parent().next().find('span').html(data.subtotalId);
    }
    $('.cart-count').html(data.count);
    $('.cart-total>span, .header-cart-total>span').html(data.total);
}