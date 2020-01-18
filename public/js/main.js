$(function () {
    $(".add_to_cart").click(function () {
        console.log($(this).attr('id'));
        console.log(BASE_URL);
        $.ajax({
            url: BASE_URL + "/shop/AddToCart",
            type: "GET",
            data: {product_id: $(this).attr('id')
            },
            success: function (result) {
                if (result) {
                    location.reload();
//console.log(result);
                }
            }
        });
    })


    $(".delete_product").click(function () {
//        console.log($(this).attr('id'));
//        console.log(BASE_URL);
        $.ajax({
            url: BASE_URL + "/shop/delete_product",
            type: "GET",
            data: {product_id: $(this).attr('id')
            },
            success: function (result) {
                if (result) {
                    var r = confirm("Are You Sure?");
                    if (r == true) {
                        location.reload();
                    } else {
//todo 
                    }

//console.log(result);
                }
            }
        });
    })


    $(".remove_from_cart").click(function () {
//        console.log($(this).attr('id'));
//        console.log(BASE_URL);
        $.ajax({
            url: BASE_URL + "/shop/remove_from_cart",
            type: "GET",
            data: {product_id: $(this).attr('id')
            },
            success: function (result) {
                if (result) {
                    location.reload();
//console.log(result);
                }
            }
        });
    })
})



$('.sm').delay('3000').slideUp();