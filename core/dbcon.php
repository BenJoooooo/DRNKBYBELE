<?php

    // Development Connection

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "drnkdup";

    // $host = "sql106.epizy.com";
    // $username = "epiz_33062076";
    // $password = "XkmirM6s8rVJsr0";
    // $database = "epiz_33062076_drnk";

    // Remote database connection
    // $host = "sql308.epizy.com";
    // $username = "epiz_32975983";
    // $password = "TihQ0Yn82oB";
    // $database = "epiz_32975983_drnkdup";

    // Creating database connection
    $con = mysqli_connect($host, $username, $password, $database);

?>