<?php 

    session_start();
    include ("../core/dbcon.php");

    if(isset($_SESSION['auth'])) {

        if(isset($_POST['scope'])) {

            $scope = $_POST['scope'];
            switch ($scope) {

                case "decline":
                    $value = '1';
                    $order_id = $_POST['order_id'];
                    $update_query = "UPDATE orders SET status = '$value' WHERE id = '$order_id'";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                    break;

                case "accept":

                    $value = '2';
                    $order_id = $_POST['order_id'];

                    $update_query = "UPDATE orders SET status = '$value' WHERE id = '$order_id'";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                    break;

                case "complete":

                    $value = '3';
                    $order_id = $_POST['order_id'];

                    $update_query = "UPDATE orders SET status = '$value' WHERE id = '$order_id'";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                    break;

                default:
                    echo 500;
            }

        }


    }