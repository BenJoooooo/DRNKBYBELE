<?php

session_start();
require "../core/dbcon.php";
include "myfunctions.php";

// php mailer info
require ("../PHPMailer/src/Exception.php");
require ("../PHPMailer/src/PHPMailer.php");
require ("../PHPMailer/src/SMTP.php");

    if(isset($_POST['signup_submit'])) {

        $name = mysqli_real_escape_string($con, $_POST['signup_fullname']);
        $email = mysqli_real_escape_string($con, $_POST['signup_email']);
        $password = mysqli_real_escape_string($con, $_POST['signup_password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['repeat_signup_password']);
        
        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {
            redirect("../signup", "Email already registered");

        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            redirect("../signup", "Please enter a valid email");

        } else {

            if(strlen($password) >= 8) {
                // Checks if password is the same with confirm password
                if ($password == $cpassword) {

                    $code = rand(999999, 111111);

                    // Insert user data
                    $insert_query = "INSERT INTO users (fullname, email,  password, code) VALUES ('$name', '$email', md5('$password'), $code)";
                    $insert_query_run = mysqli_query($con, $insert_query);
        
                    if($insert_query_run) {
                        redirectSuccess("../login", "Registered Successfully");
                    } else {
                        redirectFailed("../signup", "Something went wrong");
                    }
        
                } else {
                    redirectFailed("../signup", "Passwords do not match");
                }

            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "Password should contain atleast 8 characters");
            }

        }    

    } elseif(isset($_POST['login_submit'])) {

        $email = mysqli_real_escape_string($con, $_POST['login_email']);
        $password = md5(mysqli_real_escape_string($con, $_POST['login_password']));

        $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0) {

            $_SESSION['auth'] = true;

            $userdata = mysqli_fetch_array($login_query_run);
            $user_id = $userdata['id'];
            $username = $userdata['fullname'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role'];

            $_SESSION['auth_user'] = [

                'user_id' => $user_id,
                'fullname' => $username,  
                'email' => $useremail

            ];

            $_SESSION['role'] = $role_as;

            // if (($role_as == 'admin' || $role_as == 'manager'))
            if(($role_as == '')) {
                redirectSuccess("../index", "Logged in successfully");  
            } else {
                redirectSuccess("../admin/index", "Welcome to dashboard");
            }

        } else {
            redirectFailed("../login", "Invalid credentials");
        }

    } elseif(isset($_POST['check_email_submit'])) {

        $email = mysqli_real_escape_string($con, $_POST['login_email']);
        $query_check = "SELECT * FROM users WHERE email = '$email'";
        $query_check_run = mysqli_query($con, $query_check);

        $_SESSION['email'] = $email;

        if(mysqli_num_rows($query_check_run) > 0) {

            $code = rand(999999, 111111);
            $insert_query = "UPDATE users SET code = $code WHERE email = '$email'";
            $insert_query_run =  mysqli_query($con, $insert_query);

            if($insert_query_run) {

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
                        <h3 style='color: #ffffff; font-size: 1rem;'>We have received a request to reset your password</h3>
                        <h3 style='color: #ffffff; font-size: 1rem; text-decoration: none;'>$email</h3>
                        <h3 style='color: #ffffff; font-size: 1rem;'>Here is your one-time-password: $code</h3>
                        <hr>
                        <h5 style='color: #ffffff; font-size: 1rem;'>To reset, click the button.</h5>
                        <a href='drnkbybele.com/reset-password.php' style='text-decoration: none; color: #C27933;padding: 1rem 1.5rem; background-color: #ffffff; border-radius: 5px; text-align: center; text-transform: uppercase; font-size: 1rem; '>Reset Password</a>
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
        
                $mail->From = "info.customerservice@drnkbybele.com";
                $mail->FromName = "Drnkbybele";
                $mail->addAddress($mailTo, $email);
        
                $mail->isHTML(true);
                $mail->Subject = "Change password";
                $mail->Body = $body;
                $mail->AltBody = "";

                if($mail->send()) {
                    redirectSuccess("../reset-password", "One time password has been sent to your email!");
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'], "Something went wrong");
                }

                // php mailer instant

            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "OTP was not sent, something went wrong");
            }

        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "Email address does not exist!");
        }

    } elseif(isset($_POST['check_code_submit'])) {

        $otp = mysqli_real_escape_string($con, $_POST['login_code']);
        $query_check = "SELECT * FROM users WHERE code = '$otp'";
        $query_check_run = mysqli_query($con, $query_check);

        if(mysqli_num_rows($query_check_run) > 0) {
            $fetch_data = mysqli_fetch_array($query_check_run);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;

            redirectSuccess("../create-new-password", "Change your password");
        } else {
            redirectFailed($_SERVER['HTTP_REFERER'], "One time password is incorrect");
        }

    } elseif(isset($_POST['change_password_submit'])) {

        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        if(strlen($password) >= 8) {
            // Checks if password is the same with confirm password
            if ($password == $cpassword) {

                $code = 0;
                $email = $_SESSION['email'];
                $update_query = "UPDATE users SET code = $code, password = md5('$password') WHERE email = '$email'";
                $update_query_run = mysqli_query($con, $update_query);

                if($update_query_run) {
                    redirectSuccess("../login", "Password changed successfully!");
                } else {
                    redirectFailed($_SERVER['HTTP_REFERER'],"Something went wrong");
                }

            } else {
                redirectFailed($_SERVER['HTTP_REFERER'], "Password do not match");
            }
        } redirectFailed($_SERVER['HTTP_REFERER'], "Password need to be atleast 8 characters");
    }