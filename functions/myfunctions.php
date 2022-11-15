<?php 

    include('../core/dbcon.php');

    // fetches all data from the table
    function getAll($table) {

        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);

    }

    // function getNumberOf($table) {

    //     global $con;
    //     $query = "SELECT * FROM $table WHERE role = 'admin' || role = 'manager'";
    //     $query_run = mysqli_query($con, $query);
    //     return $count = mysqli_num_rows($query_run);

    // }

    // fetches id from the table
    function getById($table, $id) {

        global $con;
        $query = "SELECT * FROM $table WHERE id='$id'";
        return $query_run = mysqli_query($con, $query);

    }

    // Fetches data from table with admin or manager role
    function getAdmin($table) {

        global $con;
        $query = "SELECT * FROM $table WHERE role = 'admin' || role = 'manager'";
        return $query_run = mysqli_query($con, $query);

    }

    // Fetches data from table with user role
    function getUsers($table) {

        global $con;
        $query = "SELECT * FROM $table WHERE role = ''";
        return $query_run = mysqli_query($con, $query);
        
    }

    // Session messages
    function redirect($url, $message) {

        $_SESSION['message'] = $message;
        header("Location: " . $url);
        exit();
        
    }

    // Session messages
    function redirectSuccess($url, $message) {

        $_SESSION['successmessage'] = $message;
        header("Location: " . $url);
        exit();

    }

    // Session messages
    function redirectFailed($url, $message) {

        $_SESSION['failedmessage'] = $message;
        header("location: " . $url);
        exit();

    }

?>