<?php
    include ('../functions/myfunctions.php');

    if(isset($_SESSION['auth'])) {

        if($_SESSION['role'] == '') {
            redirectFailed("../index", "You are not authorized to access this page");
        } elseif($_SESSION['role'] == 'content') {
            redirectFailed("index", "You are not authorized to access this page");
        } elseif($_SESSION['role'] == 'rider') {
            redirectFailed("index", "You are not authorized to access this page");
        } elseif($_SESSION['role'] == 'manager') {

        } elseif($_SESSION['role'] == 'admin') {

        } elseif($_SESSION['role'] == 'master') {
            
        }

    } else {

        redirect("../login", "Login to continue");
        // redirect("../index.php", "You are not authorized to access this page");
        
    }

?>