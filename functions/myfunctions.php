<?php 

    include('../core/dbcon.php');

    function getAll($table) {

        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);

    }

    function getById($table, $id) {

        global $con;
        $query = "SELECT * FROM $table WHERE id='$id'";
        return $query_run = mysqli_query($con, $query);

    }

    function getAdmin($table) {
        global $con;
        $query = "SELECT * FROM $table WHERE role = 'admin' || role = 'manager'";
        return $query_run = mysqli_query($con, $query);
    }

    function getUsers($table) {
        global $con;
        $query = "SELECT * FROM $table WHERE role = ''";
        return $query_run = mysqli_query($con, $query);
    }

    function redirect($url, $message) {

        $_SESSION['message'] = $message;
        header("Location: " . $url);
        exit();
        
    }

    function getEmail($table, $email) {
        global $con;
        $query = "SELECT * FROM $table WHERE email = '$email'";
        return $query_run = mysqli_query($con, $query);
    }

?>