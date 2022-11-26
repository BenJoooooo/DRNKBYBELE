<?php

    session_start();
    include("../core/dbcon.php");

    if(isset($_POST['address'])) {

        $email = $_POST['email'];

        $status = isset($_POST['status']) ? '1':'0';

        if($status == '1') {
            $query = "INSERT INTO address (address) VALUES ('$email')";
            $query_run = mysqli_query($con, $query);
        } else {

        }
    }
?>