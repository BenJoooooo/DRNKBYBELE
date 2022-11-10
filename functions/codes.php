<?php 

session_start();
include ('../core/dbcon.php');
include ('../functions/myfunctions.php');

    // adds admin user  
    if(isset($_POST['admin_signup_submit'])) {

        $signup_fullname = $_POST['signup_fullname'];
        $signup_email = $_POST['signup_email'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);
        $role = $_POST['signup_radio'];

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {

            redirect("../admin/admin_add_new_account.php", "Email already exists");

        } else {

            // checks if password is the same with confirm password
            if($signup_password == $cpassword) {

                // Insert admin data
                $insert_query = "INSERT INTO users (fullname, email, password, role ,address)
                VALUES ('$signup_fullname', '$signup_email', '$signup_password', '$role', '$signup_address')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run) {

                    redirect("../admin/admin_admin.php", "Added Successfully");

                } else {

                    redirect("../admin/admin_add_new_account.php", "Something went wrong");

                }
            } else {

                redirect("../admin/admin_add_new_account.php", "Passwords do not match");

            }

        }

        // Adds users
    } elseif(isset($_POST['users_signup_submit'])) {

        $signup_fullname = $_POST['signup_fullname'];
        $signup_email = $_POST['signup_email'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {

            redirect("../admin/users_add_new_account.php", "Email already exists");

        } else {

            // checks if password is the same with confirm password
            if($signup_password == $cpassword) {

                // Insert admin data
                $insert_query = "INSERT INTO users (fullname, email, password ,address)
                VALUES ('$signup_fullname', '$signup_email', '$signup_password', '$signup_address')";
                $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run) {

                    redirect("../admin/admin_users.php", "Added Successfully");

                } else {

                    redirect("../admin/users_add_new_account.php", "Something went wrong");

                }
            } else {

                redirect("../admin/users_add_new_account.php", "Passwords do not match");

            }

        }

        // Updates admin user
    } elseif(isset($_POST['update_admin_submit'])) {

        $category_id = $_POST['category_id'];
        $signup_fullname = $_POST['signup_fullname'];
        $signup_email = $_POST['signup_email'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);
        $role = $_POST['signup_radio'];

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0) {

            redirect("../admin/edit_admin_account.php?id=$category_id", "Email already exists");

        } else {

            // checks if password is the same with confirm password
            if($signup_password == $cpassword) {

                // Update query
                $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', role = '$role', address = '$signup_address'
                WHERE id = '$category_id'";
                $update_query_run = mysqli_query($con, $update_query);

                if($update_query_run) {

                    redirect("../admin/admin_admin.php", "Edit successfully");

                } else {

                    redirect("../admin/edit_admin_account.php?id=$category_id", "Something went wrong");

                }
            } else {

                redirect("../admin/edit_admin_account.php?id=$category_id", "Passwords do not match");

            }

        }

        // Updates user
    }  elseif(isset($_POST['update_user_submit'])) {

        $category_id = $_POST['category_id'];
        $signup_fullname = $_POST['signup_fullname'];
        $signup_address = $_POST['signup_address'];
        $signup_password = md5($_POST['signup_password']);
        $cpassword = md5($_POST['repeat_signup_password']);
        $signup_email = $_POST['signup_email'];

        // Checks if email already registered
        $checks_email_query = "SELECT email FROM users WHERE email = '$signup_email' ";
        $check_email_query_run = mysqli_query($con, $checks_email_query);

        // Fetches data from database
        $users = getById("users", $category_id);
        if(mysqli_num_rows($users) > 0) {
            $data = mysqli_fetch_array($users);
        }

        // If data from database is equal to the input

        if(!empty($signup_email)) {

            if($data['email'] == $signup_email) {
            
                if($signup_password == $cpassword) {
    
                    // Update query
                    $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', address = '$signup_address'
                    WHERE id = '$category_id' ";
                    $update_query_run = mysqli_query($con, $update_query);
    
                    if($update_query_run) {
    
                        redirect("../admin/admin_users.php", "Edit successfully");
    
                    } else {
                        redirect("../admin/edit_user_account.php?id=$category_id", "Something went wrong");
                    }
    
                } else {
                    redirect("../admin/edit_user_account.php?id=$category_id", "Passwords do not match");
                }
            }

            if(mysqli_num_rows($check_email_query_run) > 0) {

                redirect("../admin/edit_user_account.php?id=$category_id", "Email already exists");

            } else {

                // checks if password is the same with confirm password
                if($signup_password == $cpassword) {

                    // Update query
                    $update_query = "UPDATE users SET fullname = '$signup_fullname', email = '$signup_email', password = '$signup_password', address = '$signup_address'
                    WHERE id = '$category_id' ";
                    $update_query_run = mysqli_query($con, $update_query);

                    if($update_query_run) {

                        redirect("../admin/admin_users.php", "Edit successfully");

                    } else {
                        redirect("../admin/edit_user_account.php?id=$category_id", "Something went wrong");
                    }

                } else {
                    redirect("../admin/edit_user_account.php?id=$category_id", "Passwords do not match");
                }
            }
            
        } else {
            redirect("../admin/edit_user_account.php?id=$category_id", "Email must not be empty");
        }
    }