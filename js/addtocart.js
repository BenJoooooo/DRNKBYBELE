$(document).ready(function () {

    // Increment button for adding cart
    $('.increment-btn').click(function (e) { 
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
    $('.decrement-btn').click(function (e) { 
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
    $('.addToCartBtn').click(function (e) { 
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

});