/*
 * ---------------------------------------------------
 * @author: Spainno3
 * 1. Cart Manager
 * 2. Chonse Color Product
 * 3. Search all product
 * 4. on click search category
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


    /*[ 2. Select Color ]
     ===========================================================*/
    $("#colorSelect").change(function () {
        var img = $('option:selected', this).data('color');

        $("ul.slick3-dots>li").each(function (key, value) {
            var srcImg = $(this).find('img').attr('src');
            if (srcImg.includes(img))
                $('.slick3').slick('slickGoTo', key)
        });
    });


    /*[ 3. Search  ]
     ===========================================================*/
    $('.formSearch-All').hide();

    $('.searchAll').click(function () {
        $('.formSearch-All').toggle(300);
    });

    $('#iconRemoveRecornd').click(function () {
        $('.formSearch-All').hide(300);
        $('.formSearch-All input').val('');
    });

})(jQuery);

/*[ 4. on click search category  ]
     ===========================================================*/
onSearchCategory = (id) => {
    $("#select_category").val(id);
    $('.frm-search-category').submit();
}

addToCart = (productId, options) => {
    $.ajax({
        url: '/addCart',
        method: "POST",
        data: {
            id: productId,
            options: options
        },
        success: function (data) {
            var nameProduct = $('.product-detail-name').text();
            swal(nameProduct, "is added to cart !", "success").then(() => {
                // onSetCart(data);
                location.reload();
            });
        },
        error: function () {
            swal("", "Please try again !", "error").then(() => {
                location.reload();
            });
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
            swal("Cart updated !", { button: 'OK' }).then(() => {
                onSetCart(data, $this);
            });
        },
        error: function () {
            swal("", "Please try again !", "error").then(() => {
                location.reload();
            });
        }
    });
}

onSetCart = (data, $this) => {
    // $('.update-cart').empty();
    if ($this !== null && typeof (data.subtotalId) !== 'undefined' && data.subtotalId !== '0') {
        $this.parent().parent().next().find('span').html(data.subtotalId);
        $.each(data.carts, function (key, value) {
            $(".del-item").each(function () {
                if ($(this).data('id') === value.rowId) {
                    $(this).next().find('.header-cart-item-info>span').html(value.qty);
                }
            })
        })
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