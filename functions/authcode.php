<?php

session_start();
require "../core/dbcon.php";
include "myfunctions.php";

    if(isset($_POST['signup_submit'])) {

        $name = mysqli_real_escape_string($con, $_POST['signup_fullname']);
        $email = mysqli_real_escape_string($con, $_POST['signup_email']);
        $password = md5(mysqli_real_escape_string($con, $_POST['signup_password']));
        $cpassword = md5(mysqli_real_escape_string($con, $_POST['repeat_signup_password']));
        
        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {
            
            redirect("../signup.php", "Email already registered");
            // $_SESSION['message'] = "Email already registered";
            // header('Location: ../signup.php');

        } else {

             // Checks if password is the same with confirm password
            if ($password == $cpassword) {

                // Insert user data
                $insert_query = "INSERT INTO users (fullname, email, password) VALUES ('$name', '$email', '$password')";
                $insert_query_run = mysqli_query($con, $insert_query);
    
                if($insert_query_run) {
    
                    redirect("../login.php", "Registered Successfully");
                    // $_SESSION['message'] = "Registered Successfull";
                    // header('Location: ../login.php');
    
                } else {
    
                    redirect("../signup.php", "Something went wrong");
                    // $_SESSION['message'] = "Something went wrong";
                    // header('Location: ../signup.php');
    
                }
    
            } else {

                redirect("../signup.php", "Passwords do not match");
                // $_SESSION['message'] = "Passwords do not match";
                // header('Location: ../signup.php');

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
            $username = $userdata['fullname'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role'];

            $_SESSION['auth_user'] = [

                'fullname' => $username,  
                'email' => $useremail

            ];

            $_SESSION['role'] = $role_as;

            if($role_as == 'admin' || $role_as == 'manager') {

                redirect("../admin/index.php", "Welcome to dashboard");
                // $_SESSION['message'] = "Welcome to dashboard";
                // header('Location: ../admin/index.php');

            } else {

                redirect("../index.php", "Logged in successfully");
                // $_SESSION['message'] = "Logged in successfully";
                // header('Location: ../index.php');   

            }

        } else {

            redirect("../login.php", "Invalid credentials");
            // $_SESSION['message'] = "Invalid credentials";
            // header('Location: ../login.php');

        }

    }
