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

                case "deliver":

                    $value = '4';
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

                case "fail":

                    $value = '5';
                    $order_id = $_POST['order_id'];

                    $update_query = "UPDATE orders SET status = '$value' WHERE id = '$order_id'";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                    break;

                case "delete":

                    $order_id = $_POST['order_id'];

                    $select_query = "SELECT * FROM orders WHERE id = '$order_id'";
                    $select_query_run = mysqli_query($con, $select_query);
                    $data = mysqli_fetch_array($select_query_run);

                    if($data) {
                        $id = $order_id;
                        $tracking_no = $data['tracking_no'];
                        $courier = $data['courier'];
                        $user_id = $data['user_id'];
                        $name = $data['name'];
                        $email = $data['email'];
                        $phone = $data['phone'];
                        $country = $data['country'];
                        $address = $data['address'];
                        $apartment = $data['apartment'];
                        $postal = $data['postal'];
                        $city = $data['city'];
                        $region = $data['region'];
                        $total_price = $data['total_price'];
                        $payment_mode = $data['payment_mode'];
                        $payment_id = $data['payment_id'];
                        $status = $data['status'];
                        $comments = mysqli_real_escape_string($con, $data['comments']);

                        $insert_query = "INSERT INTO archive_orders (id, tracking_no, courier, user_id, name, email, phone, country, address, apartment, postal, city, region, total_price, payment_mode, payment_id, status, comments) VALUES ('$id','$tracking_no', '$courier', '$user_id', '$name', '$email', '$phone', '$country', '$address', '$apartment', '$postal', '$city', '$region', '$total_price', '$payment_mode', '$payment_id', '$status', '$comments')";

                        $insert_query_run = mysqli_query($con, $insert_query);

                        if($insert_query_run) {
                            
                            $delete_query = "DELETE FROM orders WHERE id = '$order_id'";
                            $delete_query_run = mysqli_query($con, $delete_query);

                            if($delete_query_run) {
                                echo 201;
                            } else {
                                echo 500;
                            }

                        }
                    }
                    break;

                case "deletePermanent": 

                    $order_id = $_POST['order_id'];

                    $delete_query = "DELETE FROM archive_orders WHERE id = '$order_id'";
                    $delete_query_run = mysqli_query($con, $delete_query);

                    if($delete_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                    break;

                case "recoverOrder":

                    $order_id = $_POST['order_id'];

                    $select_query = "SELECT * FROM archive_orders WHERE id = '$order_id'";
                    $select_query_run = mysqli_query($con, $select_query);
                    $data = mysqli_fetch_array($select_query_run);

                    if($data) {
                        $id = $order_id;
                        $tracking_no = $data['tracking_no'];
                        $courier = $data['courier'];
                        $user_id = $data['user_id'];
                        $name = $data['name'];
                        $email = $data['email'];
                        $phone = $data['phone'];
                        $country = $data['country'];
                        $address = $data['address'];
                        $apartment = $data['apartment'];
                        $postal = $data['postal'];
                        $city = $data['city'];
                        $region = $data['region'];
                        $total_price = $data['total_price'];
                        $payment_mode = $data['payment_mode'];
                        $payment_id = $data['payment_id'];
                        $status = $data['status'];
                        $comments = $data['comments'];

                        $insert_query = "INSERT INTO orders (id, tracking_no, courier, user_id, name, email, phone, country, address, apartment, postal, city, region, total_price, payment_mode, payment_id, status, comments) VALUES ('$id','$tracking_no', '$courier', '$user_id', '$name', '$email', '$phone', '$country', '$address', '$apartment', '$postal', '$city', '$region', '$total_price', '$payment_mode', '$payment_id', '$status', '$comments')";

                        $insert_query_run = mysqli_query($con, $insert_query);

                        if($insert_query_run) {
                            
                            $delete_query = "DELETE FROM archive_orders WHERE id = '$order_id'";
                            $delete_query_run = mysqli_query($con, $delete_query);

                            if($delete_query_run) {
                                echo 201;
                            } else {
                                echo 500;
                            }

                        }
                    }
                    break;

                default:
                    echo 500;
            }

        }


    }