$(document).ready(function () {

    // Increment button for adding cart
    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;

        if(value < 50) {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }

        
    });

    // Decrement button for adding cart
    $(document).on('click','.decrement-btn', function (e) {

        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;

        if(value > 1) {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });

    // Add to cart
    $(document).on('click','.addToCartBtn', function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function (response) {
                if(response == 401) {
                    swal("Sorry!", "You need to login first", "info");
                }else if (response == 409) {
                    swal("Sheesh Bruh!", "Product is in the cart already", "warning");
                }else if (response == 201) {
                    swal("Great!", "Product added successfully", "success");
                }else if (response == 500) {
                    swal("Sheesh Bruh!", "Something went wrong", "error");
                }
            }
        });
    });

    // Update quantity in the cart 
    $(document).on('click','.updateQty', function () {
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).closest('.product_data').find('.prodId').val();

        
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            success: function (response) {

            }
        });
    });

    // Deletes cart item fetches the cart id
    $(document).on('click','.deleteItem', function () {
        var cart_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function (response) {
                if(response == 401) {
                    swal("Sorry!", "You need to login first", "info");
                }else if (response == 409) {
                    swal("Sheesh Bruh!", "Product is in the cart already", "warning");
                }else if (response == 200) {
                    swal("Great!", "Product deleted successfully", "success");
                    $('#myCart').load(location.href + " #myCart");
                }else if (response == 500) {
                    swal("Sheesh Bruh!", "Something went wrong", "error");
                }
            }
        });
    });

    // Buy now function
    $(document).on('click', '.buyNowBtn', function (e) {
        
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "buyNow"
            },
            success: function (response) {
                if(response == 201) {
                    location.href = "checkout";
                } else if(response == 500) {
                    swal("Sorry!", "Something went wrong", "error");
                } else if(response == 409) {
                    swal("Uh Oh!", "Product exists", "error")
                }
            }
        });

    });

});