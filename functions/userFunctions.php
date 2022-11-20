<!-- Insert all user side functions here -->

<?php 

    session_start();
    include("core/dbcon.php");

    // Fethes all data from the table
    function getCategoriesProducts($table) {

        global $con;
        $query = "SELECT * FROM $table WHERE status = '0'"; // Status 0 is equals to visible, while status 1 is equals to hidden //
        return $query_run = mysqli_query($con, $query);

    }

    // fetches all data from the table
    function getImage($table) {

        global $con;
        $query = "SELECT * FROM $table WHERE status = '0'"; // Status 0 is equals to visible, while status 1 is hidden //
        return $query_run = mysqli_query($con, $query);
    }
    
?>

