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

    // Fetches data from table products and table categories
    // Fetches the id, image, name, and categories name 
    function getJointData($table1, $table2) {
        global $con;
        $query = "SELECT products.id, products.image, products.name AS product_name, categories.name AS category_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id AND products.status = '0'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches data from table products and table categories where products featured is true
    function getFeaturedProducts($table1, $table2) {
        global $con;
        $query = "SELECT products.id, products.image, products.name AS product_name, categories.name AS category_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id AND products.featured = '1'";
        return $query_run = mysqli_query($con, $query);
    }
    
?>

