<?php

    // Development Connection

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "drnkdup";

    // $host = "sql313.epizy.com";
    // $username = "epiz_33061753";
    // $password = "CYAJ5W5XIWEIc";
    // $database = "epiz_33061753_drnkdup";

    // Remote database connection
    // $host = "sql308.epizy.com";
    // $username = "epiz_32975983";
    // $password = "TihQ0Yn82oB";
    // $database = "epiz_32975983_drnkdup";

    // Creating database connection
    $con = mysqli_connect($host, $username, $password, $database);

?>