<?php

session_start();
require "../core/dbcon.php";
include "myfunctions.php";

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

                    // Insert user data
                    $insert_query = "INSERT INTO users (fullname, email,  password) VALUES ('$name', '$email', md5('$password'))";
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

    }
