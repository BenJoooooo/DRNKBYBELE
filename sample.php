<?php

    include ("functions/userFunctions.php"); 

    // $myIp = json_decode(file_get_contents('https://ipinfo.io/'));
    // var_dump($myIp);

    // $ip = $myIp->ip;
    // $country = $myIp->country;

    // echo $ip . $country;

    // $reg_email = $_POST["email"];
    // $status = isset($_POST["status"]) ? '1':'0';
    
    // echo $reg_email;
    // echo $status;


    // $query = "INSERT INTO address (address) VALUES ('$reg_email')";
    // $query_run = mysqli_query($con, $query);


    echo $_SESSION['status'];
    echo $_SESSION['courier'];
    echo $_SESSION['price'];
    echo $_SESSION['specialmsg'];
?>

    

