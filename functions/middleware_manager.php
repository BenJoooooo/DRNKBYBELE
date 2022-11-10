<?php

    // include ('../functions/myfunctions.php');

    if(isset($_SESSION['auth'])) {

        // if($_SESSION['role'] != 'admin')
        if($_SESSION['role'] != 'admin') { 

            // redirect("../index.php", "You are not authorized to access this page");
            // redirect("../login.php", "Login to continue");
            redirect("index.php", "You are not authorized to access this page");

        } else {

        }

    } else {

        redirect("../login.php", "Login to continue");
        // redirect("../index.php", "You are not authorized to access this page");
        
    }

?>