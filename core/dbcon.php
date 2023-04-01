<?php

    // Development Connection

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "drnkdup";

    // $host = "sql203.epizy.com";
    // $username = "epiz_33867229";
    // $password = "JfIBHb3O6B66fA";
    // $database = "epiz_33867229_drnk";

    // Remote database connection
    // $host = "sql308.epizy.com";
    // $username = "epiz_32975983";
    // $password = "TihQ0Yn82oB";
    // $database = "epiz_32975983_drnkdup";

    // Creating database connection
    $con = mysqli_connect($host, $username, $password, $database);

?>