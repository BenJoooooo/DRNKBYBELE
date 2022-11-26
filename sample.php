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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="functions/sampletwo.php" method="POST">
        <input type="email" name="email"  value="<?= $reg_email; ?>">
        <input type="checkbox" name="status" value="<?= $status == '0' ? '':'checked'; ?>">

        <button type="submit" name="address">submit</button>
    </form> -->
</body>
</html>




    

