<?php 

    include('../core/dbcon.php');

    // fetches all data from the table
    function getAll($table) {
        global $con;
        $query = "SELECT *, DATE_FORMAT(created_at, '%a, %M %e  %Y | %k:%i') AS created_at 
        FROM $table";
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

    function getCartItems() {
        global $con;
        $user_id = $_SESSION['auth_user']['user_id'];

        $query = "SELECT c.id AS cid, c.prod_id, c.prod_qty, p.id AS pid, p.category_id, p.name, 
        p.image, p.slug, p.selling_price, p.size, t.name as cat_name, t.id 
        FROM carts c, products p, categories t 
        WHERE c.prod_id = p.id 
        AND c.user_id = '$user_id' 
        AND p.category_id = t.id  
        ORDER BY c.id DESC";

        return $query_run = mysqli_query($con, $query);
    }

    function getOrders($table) {
        global $con;
        $query = "SELECT id, user_id, tracking_no, FORMAT(total_price, '#,###,###.##') AS total_price, status, DATE_FORMAT(created_at, '%a, %M %e  %Y | %k:%i') AS created_at FROM $table ";
        return $query_run = mysqli_query($con, $query);
    }

    function getOrdersByStatus($table) {
        global $con;
        $query = "SELECT id, tracking_no, FORMAT(total_price, '#,###,###.##') AS total_price, status, DATE_FORMAT(created_at, '%a, %M %e  %Y | %k:%i') AS created_at FROM $table
        ORDER BY status ASC, id DESC";
        return $query_run = mysqli_query($con, $query);
    }

    function getOrdersByDeclined($table) {
        global $con;
        $query = "SELECT id, tracking_no, FORMAT(total_price, '#,###,###.##') AS total_price, status, DATE_FORMAT(created_at, '%a, %M %e  %Y | %k:%i') AS created_at FROM $table
        WHERE status = '1'
        ORDER BY status ASC, id DESC";
        return $query_run = mysqli_query($con, $query);
    }

    function getOrdersByAccept($table) {
        global $con;
        $query = "SELECT id, tracking_no, FORMAT(total_price, '#,###,###.##') AS total_price, status, DATE_FORMAT(created_at, '%a, %M %e  %Y | %k:%i') AS created_at FROM $table
        WHERE status = '2'
        ORDER BY status ASC, id DESC";
        return $query_run = mysqli_query($con, $query);
    }

    function getOrdersByComplete($table) {
        global $con;
        $query = "SELECT id, tracking_no, FORMAT(total_price, '#,###,###.##') AS total_price, status, DATE_FORMAT(created_at, '%W %M %e %Y') AS date_created
        FROM $table
        WHERE status = '3'
        ORDER BY status ASC, id DESC";
        return $query_run = mysqli_query($con, $query);
    }


    function getSameDayOrders($table) {
        global $con;
        $query = "SELECT id, tracking_no, FORMAT(price, '#,###,###.##') AS price, status, DATE_FORMAT(date_created, '%W %M %e %Y')
        FROM $table";
        return $query_run = mysqli_query($con, $query);
    }

?>