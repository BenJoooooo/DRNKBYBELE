<?php 

    include('../core/dbcon.php');

    // fetches all data from the table
    function getAll($table) {
        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);
    }

    // fetches id from the table
    function getById($table, $id) {
        global $con;
        $query = "SELECT * FROM $table WHERE id='$id'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches data from table with admin or manager role
    function getAdmin($table) {
        global $con;
        $query = "SELECT * FROM $table WHERE role = 'admin' || role = 'manager' || role = 'content'";
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

    function getBlogsActive($table) {
        global $con;
        $query = "SELECT * FROM $table WHERE posted = '0'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches name of product and category
    function getProductAndCategory($table1, $table2) {
        global $con;
        $query  = "SELECT products.id AS product_id, products.category_id, products.size, products.name, products.size, products.original_price, products.selling_price, products.image, products.slug, products.description, products.status, products.featured, products.created_at, products.added_by, categories.id, categories.name AS cat_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id";
        return $query_run = mysqli_query($con, $query);
    }

    function getProductAndCategoryById($table1, $table2, $id) {
        global $con;
        $query  = "SELECT products.id AS product_id, products.category_id, products.size, products.name, products.size, products.original_price, products.selling_price, products.image, products.slug, products.description, products.status, products.featured, products.created_at, products.added_by, categories.id, categories.name AS cat_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id
        AND products.id = '$id'";
        return $query_run = mysqli_query($con, $query);
    }

?>