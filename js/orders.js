$(document).ready(function () {
    
    // Decline Orders
    $(document).on('click','.declineOrder', function () {

        var order_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handle_orders.php",
            data: {
                "order_id": order_id,
                "scope": "decline"
            }, 
            success: function (response) {
                if(response == 401) {
                    swal("Sorry!", "You need to login first", "info");
                }else if (response == 201) {
                    swal("Great!", "Order declined", "success");
                }else if (response == 500) {
                    swal("Sheesh Bruh!", "Something went wrong", "error");
                }
            }
        });
    });
    
});