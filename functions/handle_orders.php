<?php 

    session_start();
    include ("../core/dbcon.php");

    if(isset($_SESSION['auth'])) {

        if(isset($_POST['scope'])) {

            $scope = $_POST['scope'];
            switch ($scope) {

                case "decline":
                    $order_id = $_POST['order_id'];

                    $update_query = "UPDATE orders SET status = '1' WHERE id = '$order_id'";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                    break;
            }

        }


    }