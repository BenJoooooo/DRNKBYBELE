$(document).ready(function () {
    
    // Decline Orders
    $(document).on('click','.declineOrder', function () {

        var order_id = $(this).val();

        swal({
            title: "Confirmation",
            text: "Order will be declined",
            icon: "error",
            buttons: true,
            dangerMode: true,
          })
          .then((willDecline) => {

            if (willDecline) {

              $.ajax({
                method: "POST",
                url: "../functions/handle_orders.php",
                data: {
                    'order_id': order_id,
                    'scope': 'decline',
                    'declineOrder': true
                },
                success: function(response) {
                    if(response == 201) {
                        swal("Order declined!", "", "success");
                        $("#coverphotos_table").load(location.href + " #coverphotos_table");
                    } else if(response == 500) {
                        swal("Error!", "Something went wrong", "error");
                    }
                }
              });

            }
          });

    });

    $(document).on('click', '.acceptOrder', function () {
        
        var order_id = $(this).val();

        swal({
            title: "Confirmation",
            text: "Order will be processed once accepted",
            icon: "info",
            buttons: true,
            dangerMode: true,
          })
          .then((willAccept) => {

            if (willAccept) {

              $.ajax({
                method: "POST",
                url: "../functions/handle_orders.php",
                data: {
                    'order_id': order_id,
                    'scope': 'accept',
                    'declineOrder': true
                },
                success: function(response) {
                    if(response == 201) {
                        swal("Order Accepted!", "", "success");
                        $("#coverphotos_table").load(location.href + " #coverphotos_table");
                    } else if(response == 500) {
                        swal("Error!", "Something went wrong", "error");
                    }
                }
              });

            }
          });

    });

    $(document).on('click', '.completeOrder', function () {
        
        var order_id = $(this).val();

        swal({
            title: "Confirmation",
            text: "Order will be marked completed",
            icon: "success",
            buttons: true,
            dangerMode: true,
          })
          .then((willComplete) => {

            if (willComplete) {

              $.ajax({
                method: "POST",
                url: "../functions/handle_orders.php",
                data: {
                    'order_id': order_id,
                    'scope': 'complete',
                    'declineOrder': true
                },
                success: function(response) {
                    if(response == 201) {
                        swal("Order Completed!", "", "success");
                        $("#coverphotos_table").load(location.href + " #coverphotos_table");
                    } else if(response == 500) {
                        swal("Error!", "Something went wrong", "error");
                    }
                }
              });

            }
          });

    });
    
});