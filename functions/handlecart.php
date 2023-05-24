<?php

    session_start();
    include('../core/dbcon.php');

    // User cannot add to cart if not logged in
    if(isset($_SESSION['auth'])) {

        // User cannot access from url
        if(isset($_POST['scope'])) {
            $scope = $_POST['scope'];
            switch ($scope) {

                case "add": 
                    
                    $prod_id = $_POST['prod_id'];
                    $prod_qty = $_POST['prod_qty'];
                    $user_id = $_SESSION['auth_user']['user_id'];

                    $check_existing_cart = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                    $check_existing_cart_run = mysqli_query($con, $check_existing_cart);
                    $getId = mysqli_fetch_array($check_existing_cart_run);

                    if(mysqli_num_rows($check_existing_cart_run) > 0) {

                        if($prod_qty == 1) {

                            // $update_query = "UPDATE carts SET prod_qty = $qty WHERE prod_id = '$prod_id', AND user_id = '$user_id'";
                            // $update_query_run = mysqli_query($con, $update_query);

                            $qty = $getId['prod_qty'] + 1;

                            $update_query = "UPDATE carts SET prod_qty = ('$qty') WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                            $update_query_run = mysqli_query($con, $update_query);

                                if($update_query_run) {
                                    echo 201;
                                } else {
                                    echo 500;
                                }

                        } else {

                            $qty = $getId['prod_qty'] + $prod_qty;

                            $update_query = "UPDATE carts SET prod_qty = ('$qty') WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                            $update_query_run = mysqli_query($con, $update_query);

                                if($update_query_run) {
                                    echo 201;
                                } else {
                                    echo 500;
                                }
                        }

                    } else {

                        $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id', '$prod_id', '$prod_qty')"; 
                        $insert_query_run = mysqli_query($con, $insert_query);

                        if($insert_query_run) {
                            echo 201;
                        } else {
                            echo 500;
                        }
                    }

                    break;

                case "update":

                    $prod_id = $_POST['prod_id'];
                    $prod_qty = $_POST['prod_qty'];
                    $user_id = $_SESSION['auth_user']['user_id'];

                    $check_existing_cart = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                    $check_existing_cart_run = mysqli_query($con, $check_existing_cart);

                    if(mysqli_num_rows($check_existing_cart_run) > 0) {

                        $update_query = "UPDATE carts SET prod_qty = '$prod_qty' WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                        $update_query_run = mysqli_query($con, $update_query); 
                        
                        if($update_query_run) {
                            echo 201;
                        } else {
                            echo 500;
                        }
                        
                    } else {

                        echo 500;
                        
                    }
                    break;

                case "delete":

                    $cart_id = $_POST['cart_id'];
                    $user_id = $_SESSION['auth_user']['user_id'];

                    $check_existing_cart = "SELECT * FROM carts WHERE id = '$cart_id' AND user_id = '$user_id'";
                    $check_existing_cart_run = mysqli_query($con, $check_existing_cart);

                    if(mysqli_num_rows($check_existing_cart_run) > 0) {

                        $delete_query = "DELETE FROM carts WHERE id = '$cart_id' ";
                        $delete_query_run = mysqli_query($con, $delete_query); 
                        if($delete_query_run) {
                            echo 200;
                        } else {
                            echo 500;
                        }
                        
                    } else {

                        echo 500;
                        
                    }
                    break;

                case "buyNow":

                    $qty = $_POST['prod_qty'];
                    $prod_id = $_POST['prod_id'];
                    $user_id = $_SESSION['auth_user']['user_id'];

                    $check_existing_cart = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                    $check_existing_cart_run = mysqli_query($con, $check_existing_cart);
                    $getId = mysqli_fetch_array($check_existing_cart_run);


                    if(mysqli_num_rows($check_existing_cart_run) > 0) {

                        $qty = $getId['prod_qty'] + 1;
                        $update_query = "UPDATE carts SET prod_qty = ('$qty') WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                        $update_query_run = mysqli_query($con, $update_query);

                            if($update_query_run) {
                                echo 201;
                            } else {
                                echo 500;
                            }

                    } else {

                        $insert_query = "INSERT INTO carts (user_id, prod_id, prod_qty) VALUES ('$user_id', '$prod_id', '$qty')"; 
                        $insert_query_run = mysqli_query($con, $insert_query);

                        if($insert_query_run) {
                            echo 201;
                        } else {
                            echo 500;
                        } 
                    }
                    break;

                default:
                    echo 500;
            }
        }

    } else {

        echo 401;

    }


?>