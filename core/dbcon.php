<?php

    // Development Connection

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "drnkdup";

    // Remote database connection
    // $host = "remotemysql.com";
    // $username = "S6YgyM4GtY";
    // $password = "0vMcqT6aA1";
    // $database = "S6YgyM4GtY";

    // Creating database connection
    $con = mysqli_connect($host, $username, $password, $database);

?>