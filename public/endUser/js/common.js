/*
 * ---------------------------------------------------
 * @Auth: Spainno3
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
    $('.update-cart').on('click', function (e) {
        let rowId = $(this).data('id');
        let urlUpdate = $(this).data('url');
        let quantity = $(this).parent().find('input[name="num-product1"]').val();
        updateCart(rowId, quantity, urlUpdate, $(this));
    });

    //Remove item
    $('.del-item').on('click', function () {
        swal({
            title: "Are you sure?",
            buttons: true
        }).then((value) => {
            if (value) {
                let rowId = $(this).data('id');
                let urlDelete = $(this).data('url');
                $(".del-item").each(function () {
                    if ($(this).data('id') === rowId) {
                        $(this).parents('.table-row').remove();
                        $(this).parents('.header-cart-item').remove()
                    }
                })
                updateCart(rowId, 0, urlDelete, $(this));
            }
        });
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
            var nameProduct = $('.product-detail-name').text();
            swal(nameProduct, "is added to cart !", "success");
        },
        error: function () {
            swal("", "Please try again !", "error");
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
            swal("Cart updated !", {button: false});
        },
        error: function () {
            swal("", "Please try again !", "error");
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
    if (data.count === 0) {
        $('.header-cart-total').remove();
    }
}

onSave = (message, type) => {
    swal("", message, type);
}