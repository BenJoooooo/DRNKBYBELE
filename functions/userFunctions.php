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
        $query = "SELECT products.id, products.description, products.image, products.name AS product_name, products.slug, products.size, categories.name AS category_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id AND products.status = '0'
        ORDER BY product_name";
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
        $query = "SELECT products.id, products.image, products.size, products.name AS product_name, products.slug, categories.id, categories.name AS category_name
        FROM products, categories
        WHERE products.category_id = categories.id AND products.category_id = '$category_id' AND products.status = '0'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches data from two tables where slug is equal to the fetched slug data from the url
    function getTablesOnSlug($table1,$table2, $slug) {
        global $con;
        $query = "SELECT products.id, products.description, products.image, products.selling_price, products.name AS product_name, products.slug, products.size, categories.name AS category_name
        FROM $table1, $table2
        WHERE products.category_id = categories.id AND products.status = '0' AND products.slug = '$slug'";
        return $query_run = mysqli_query($con, $query);
    }

    // Fetches product items of the authenticated user added to cart
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

    function getCartDetails() {
        global $con;
        $user_id = $_SESSION['auth_user']['user_id'];

        $query = "SELECT c.id AS cid, c.prod_id, c.prod_qty, p.id AS pid, p.category_id, p.name, 
        p.image, p.slug, p.selling_price, p.size, t.name as cat_name, t.id, u.id AS uid, u.email, u.fullname, u.address, u.country, u.apartment, u.city, u.postal, u.region, u.phone
        FROM carts c, products p, categories t, users u
        WHERE c.prod_id = p.id 
        AND c.user_id = '$user_id' 
        AND p.category_id = t.id
        AND u.id = '$user_id'  
        ORDER BY c.id DESC";
        return $query_run = mysqli_query($con, $query);
    }

    function getOrders($table) {
        global $con;
        $user_id = $_SESSION['auth_user']['user_id'];
        // $query = "SELECT * FROM $table WHERE user_id = '$user_id' AND status != '3'
        $query = "SELECT id, user_id, tracking_no, FORMAT(total_price, '#,###,###.##') AS total_price, status, DATE_FORMAT(created_at, '%a, %M %e  %Y | %k:%i') AS created_at FROM $table 
        WHERE user_id = '$user_id' AND status != '3'
        ORDER BY id DESC";
        return $query_run = mysqli_query($con, $query);
    }

    function getOrderHistory($table) {
        global $con;
        $user_id = $_SESSION['auth_user']['user_id'];
        // $query = "SELECT * FROM $table WHERE user_id = '$user_id' AND status != '0' AND status != '1' AND status != '2'
        $query = "SELECT id, user_id, tracking_no, total_price, status, DATE_FORMAT(created_at, '%a, %M %e  %Y | %k:%i') AS created_at FROM $table 
        WHERE user_id = '$user_id' AND status = '3'
        ORDER BY id DESC";
        return $query_run = mysqli_query($con, $query);
    }

    function checkTrackingNoValid($trackingNo) {
        global $con;

        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo' AND user_id = '$user_id'";
        return mysqli_query($con, $query);
    }

    function checkTrackingAndOrderDetails($trackingNo) {
        global $con;

        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT o.tracking_no, o.user_id AS oid, o.payment_mode, o.total_price, o.email, o.name, o.address, o.apartment, o.postal, o.city, o.region, o.phone, o.courier, o.comments, u.id AS uid
        FROM orders o, users u
        WHERE o.user_id = u.id
        AND o.tracking_no = '$trackingNo'
        AND user_id = '$user_id'";

        return $query_run = mysqli_query($con, $query);
    }

    function checkTrackingAndOrderDetailsAdmin($trackingNo) {
        global $con;

        $query = "SELECT o.tracking_no, o.user_id AS oid, o.payment_mode, o.total_price, o.email, o.name, o.address, o.apartment, o.postal, o.city, o.region, o.phone, o.courier, o.comments, u.id AS uid
        FROM orders o, users u
        WHERE o.user_id = u.id
        AND o.tracking_no = '$trackingNo'";

        return $query_run = mysqli_query($con, $query);
    }

    function getOrderDetails($trackingNo) {
        global $con;
        $query = "SELECT od.id, od.order_id, od.prod_id, od.qty, od.price, p.id AS pid, p.name AS prod_name, p.image, p.size, p.category_id, c.id AS cid, c.name AS cat_name, o.id AS oid, o.courier, o.tracking_no, o.status
        FROM order_items od, products p, categories c, orders o
        WHERE od.prod_id = p.id
        AND p.category_id = c.id
        AND od.order_id = o.id
        AND o.tracking_no = '$trackingNo'";
        return $query_run = mysqli_query($con, $query);
    }
?>

