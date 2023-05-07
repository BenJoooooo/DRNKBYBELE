<?php

session_start();
require "../core/dbcon.php";
include "myfunctions.php";

// php mailer info
require ("../PHPMailer/src/Exception.php");
require ("../PHPMailer/src/PHPMailer.php");
require ("../PHPMailer/src/SMTP.php");

    if(isset($_POST['send_message'])) {

        $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone_number']);
        $message = mysqli_real_escape_string($con, $_POST['message']);

        $insert = "INSERT INTO contact_message (name, email, phone, message) VALUES ('$fullname', '$email', '$phone', '$message')";
        $insery_query = mysqli_query($con, $insert);

        if($insery_query) {

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
                        <h3 style='color: #ffffff; font-size: 1rem;'>Message from $fullname</h3>
                        <h3 style='color: #ffffff; font-size: 1rem;'>$message</h3>
                        <h3 style='color: #ffffff; font-size: 1rem;'>$phone</h3>
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
        
                $mail->From = $email;
                $mail->FromName = $fullname;
                $mail->addAddress($mailTo, $name);
        
                $mail->isHTML(true);
                $mail->Subject = "Contact Form Message";
                $mail->Body = $body;
                $mail->AltBody = "";
        
                if(!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    echo "<h1>Message has been sent</h1>";     
                }
                // php mailer instant

            if($mail->send()) {
                redirectSuccess("../contact", "Message sent successfully!");
            } else {
                redirectFailed("../contact", "Something went wrong");
            }

        }

    }

?>