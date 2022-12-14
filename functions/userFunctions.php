<!-- Insert all user side functions here -->

<?php 

    session_start();
    include("core/dbcon.php");

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

    function getAll($table) {
        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches data with active posted status.
    function getActiveData($table) {
        global $con;
        $query = "SELECT * FROM $table WHERE posted = '0'";
        return $query_run = mysqli_query($con, $query);
    }
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
        $query = "SELECT products.id, products.description, products.image, products.name AS product_name, products.slug, categories.name AS category_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id AND products.status = '0'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches data from table products and table categories where products featured is true
    function getFeaturedProducts($table1, $table2) {
        global $con;
        $query = "SELECT products.id, products.slug, products.image, products.name AS product_name, categories.name AS category_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id AND products.featured = '1' AND products.status = '0'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches active slug from the url
    function getSlugActive($table, $slug) {
        global $con;
        $query = "SELECT * FROM $table WHERE slug = '$slug' AND status = '0' LIMIT 1";
        return $query_run = mysqli_query($con, $query);
    }

    // Get data active slug from blogsabout
    function getBlogSlugActive($table, $slug) {
        global $con;
        $query = "SELECT * FROM $table WHERE slug = '$slug' AND posted = '0' LIMIT 1";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches active ID from the url
    function getActiveId($table, $id) {
        global $con;
        $query = "SELECT * FROM $table WHERE id = '$id' AND status = '0'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetch products by categories
    function getProductsbyCategory($category_id) {
        global $con;
        $query = "SELECT products.id, products.image, products.name AS product_name, products.slug, categories.id, categories.name AS category_name
        FROM products, categories
        WHERE products.category_id = categories.id AND products.category_id = '$category_id' AND products.status = '0'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches data from two tables where slug is equal to the fetched slug data from the url
    function getTablesOnSlug($table1,$table2, $slug) {
        global $con;
        $query = "SELECT products.id, products.description, products.image, products.selling_price, products.name AS product_name, products.slug, categories.name AS category_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id AND products.status = '0' AND products.slug = '$slug'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches product items of the authenticated user added to cart
    function getCartItems() {
        global $con;
        $user_id = $_SESSION['auth_user']['user_id'];

        $query = "SELECT c.id AS cid, c.prod_id, c.prod_qty, p.id AS pid, p.category_id, p.name, 
        p.image, p.slug, p.selling_price,t.name as cat_name, t.id 
        FROM carts c, products p, categories t 
        WHERE c.prod_id = p.id 
        AND c.user_id = '$user_id' 
        AND p.category_id = t.id  
        ORDER BY c.id DESC";

        return $query_run = mysqli_query($con, $query);

    }

    function getCartDetails() {
        global $con;
        $user_id = $_SESSION['auth_user']['user_id'];

        $query = "SELECT c.id AS cid, c.prod_id, c.prod_qty, p.id AS pid, p.category_id, p.name, 
        p.image, p.slug, p.selling_price,  t.name as cat_name, t.id, u.email, u.fullname, u.address, u.country, u.apartment, u.city, u.postal, u.region, u.phone
        FROM carts c, products p, categories t, users u
        WHERE c.prod_id = p.id 
        AND c.user_id = '$user_id' 
        AND p.category_id = t.id
        AND u.id = '$user_id'  
        ORDER BY c.id DESC";

        return $query_run = mysqli_query($con, $query);

    }
    

?>

