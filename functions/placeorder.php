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

         // php mailer instant
         $mailTo = $email;
         $body = "<!DOCTYPE html>
         <html lang='en'>
         <head>
             <meta charset='UTF-8'>
             <meta http-equiv='X-UA-Compatible' content='IE=edge'>
             <meta name='viewport' content='width=device-width, initial-scale=1.0'>
             <title>Document</title>
         </head>
         <body>
             <div style='max-width: 600px; width: 100%; margin: 0 auto; background-color: #C27933; padding: 40px;' >
                 <h1 style='color: #ffffff; font-size: 2rem;'>DRNK BY BELE</h1>
                 <hr>
                 <h3 style='color: #ffffff; font-size: 1rem;'>We Have received your order $name!</h3>
                 <h3 style='color: #ffffff; font-size: 1rem;'>Thank you for your purchase</h3>
                 <hr>
                 <h5 style='color: #ffffff; font-size: 1rem;'>For updates, click the button.</h5>
                 <a href='drnkbybele.com/mypurchase' style='text-decoration: none; color: #C27933;padding: 1rem 1.5rem; background-color: #ffffff; border-radius: 5px; text-align: center; text-transform: uppercase; font-size: 1rem; '>My Purchase</a>
             </div>
         </body>
         </html>";
 
         $mail = new PHPMailer\PHPMailer\PHPMailer();
         // $mail->SMTPDebug = 3;
         $mail->isSMTP();

         // $mail->Host = "mail.smtp2go.com"; 
         $mail->Host= "smtp-relay.sendinblue.com";

         $mail->SMTPAuth = true;
         // $mail->Username = "drnkbybele";
         // $mail->Password = "Gr4FCbPgwVrC56tJ";
         $mail->SMTPSecure = "tls";
         // $mail->Port = "2525";

         $mail->Username = "drnkbybele@gmail.com";
         $mail->Password = "am7kI5Z4KJqAz318";
         $mail->Port = "587";
 
         $mail->From = "info.partners@drnkbybele.com";
         $mail->FromName = "Drnk Sales";
         $mail->addAddress($mailTo, $name);
 
         $mail->isHTML(true);
         $mail->Subject = "Order Complete";
         $mail->Body = $body;
         $mail->AltBody = "";
 
         if(!$mail->send()) {
             echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
             echo "<h1>Message has been sent</h1>";     
         }
         // php mailer instant

        if($insert_query_run) {

                // php mailer instant
                $mailTo = "info.customerservice@drnkbybele.com";
                $body = "<!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Document</title>
                </head>
                <body>
                    <div style='max-width: 600px; width: 100%; margin: 0 auto; background-color: #C27933; padding: 40px;' >
                        <h1 style='color: #ffffff; font-size: 2rem;'>DRNK BY BELE</h1>
                        <hr>
                        <h3 style='color: #ffffff; font-size: 1rem;'>New order from $name</h3>
                        <h3 style='color: #ffffff; font-size: 1rem;'>Total amount is $totalPrice pesos</h3>
                        <br>
                        <a href='drnkbybele.com/admin/orders_page' style='text-decoration: none; color: #C27933;padding: 1rem 1.5rem; background-color: #ffffff; border-radius: 5px; text-align: center; text-transform: uppercase; font-size: 1rem; '>Orders Page</a>
                    </div>
                </body>
                </html>";
        
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                // $mail->SMTPDebug = 3;
                $mail->isSMTP();

                // $mail->Host = "mail.smtp2go.com"; 
                $mail->Host= "smtp-relay.sendinblue.com";

                $mail->SMTPAuth = true;
                // $mail->Username = "drnkbybele";
                // $mail->Password = "Gr4FCbPgwVrC56tJ";
                $mail->SMTPSecure = "tls";
                // $mail->Port = "2525";

                $mail->Username = "drnkbybele@gmail.com";
                $mail->Password = "am7kI5Z4KJqAz318";
                $mail->Port = "587";
        
                $mail->From = "info.sales@drnkbybele.com";
                $mail->FromName = "Drnkbybele";
                $mail->addAddress($mailTo, "Drnkybybele");
        
                $mail->isHTML(true);
                $mail->Subject = "New Order";
                $mail->Body = $body;
                $mail->AltBody = "";
        
                if(!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    echo "<h1>Message has been sent</h1>";     
                }
                // php mailer instant

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
                    echo 200;
                    exit();
                } else {
                    redirectSuccess("../mypurchase.php", "Order placed successfully");
                    echo 200;
                }
            }
        }

    } else {
        redirectFailed('index.php', "Something went wrong");
    }

?>
