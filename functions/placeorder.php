<?php

    session_start();
    include ("myfunctions.php");
    include ("../authenticate-user.php");

    // php mailer info
    require ("../PHPMailer/src/Exception.php");
    require ("../PHPMailer/src/PHPMailer.php");
    require ("../PHPMailer/src/SMTP.php");

    if(isset($_POST['paynow'])) {

        $_SESSION['payment'] = $_POST['payment'];

        $user = $_SESSION['userid'];
        $courier = $_SESSION['courier'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
        $country = $_SESSION['country'];
        $address = $_SESSION['address'];
        $apartment = $_SESSION['apartment'];
        $postal = $_SESSION['postal'];
        $city = $_SESSION['city'];
        $region = $_SESSION['region'];
        $totalPrice = $_SESSION['price'];
        $paymentMode = $_SESSION['payment'];
        $paymentId;
        $status;
        $comments = $_SESSION['specialmsg'];

        $trackingNo = "drnkorder".rand(10000, 100000);

        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id AS cid, c.prod_id, c.prod_qty, p.id AS pid, p.category_id, p.name, 
        p.image, p.slug, p.selling_price, p.size, t.name as cat_name, t.id 
        FROM carts c, products p, categories t 
        WHERE c.prod_id = p.id 
        AND c.user_id = '$user_id' 
        AND p.category_id = t.id  
        ORDER BY c.id DESC";
        $query_run = mysqli_query($con, $query);

        $insert_query = "INSERT INTO orders (tracking_no, courier, user_id, name, email, phone, country, address, apartment, postal, city, region, total_price, payment_mode, comments) VALUES ('$trackingNo', '$courier', '$user', '$name', '$email', '$phone', '$country', '$address', '$apartment', '$postal', '$city', '$region', '$totalPrice', '$paymentMode', '$comments')";

        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run) {

            $order_id = mysqli_insert_id($con);
            
            foreach ($query_run as $item) {

                $prod_id = $item['prod_id'];
                $prod_qty = $item['prod_qty'];
                $price = $item['selling_price'];

                $total_price = $prod_qty * $price;

                $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) VALUES ('$order_id', '$prod_id', '$prod_qty', '$total_price')";

                $insert_items_query_run = mysqli_query($con, $insert_items_query);
            }

            $delete_cart_query = "DELETE FROM carts WHERE user_id = '$user'";
            $delete_cart_query_run = mysqli_query($con, $delete_cart_query);

            if($delete_cart_query_run) {
                if($paymentMode == 'paymongo') {
                    header("Location: https://paymongo.page/l/drnk-by-bele-cafe");
                    exit();
                } else {
                    redirectSuccess("../mypurchase.php", "Order placed successfully");
                }
            }
        }

    } else {
        redirectFailed('index.php', "Something went wrong");
    }

?>
