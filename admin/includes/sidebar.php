    
<?php 

    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);

?>
    <div class="admin-wrapper-content">
        <div class="admin-side-menu">
            <div class="admin-side-menu-brand">
                <h1 class="admin-side-menu-title">Drnk by Bele </h1>
            </div>
            <div class="admin-side-menu-links">
                <div class="child-menu">
                    <h4>Menu</h4>
                </div>
                <div class="child <?= $page ==  "index.php" ? 'active':''; ?>">
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home</a>
                </div>
                <div class="child <?= $page ==  "admin_manage_home.php" ? 'active':''; ?> ">
                    <i class="far fa-file-code"></i>
                    <a href="admin_manage_home.php">Manage</a>
                </div>
                <div class="child <?= $page ==  "blogs.php" ? 'active':''; ?>">
                    <i class="fas fa-file-invoice"></i>
                    <a href="blogs.php">Blogs</a>
                </div>
                <div class="child <?= $page ==  "sales.php" ? 'active':''; ?>">
                    <i class="fas fa-poll"></i>
                    <a href="sales.php">Sales</a>
                </div>
                
                <?php if($_SESSION['role'] == 'admin') { ?>
                    <div class="child <?= $page ==  "admin_admin.php" ? 'active':''; ?>">
                        <i class="fas fa-user-cog"></i>
                        <a href="admin_admin.php">Admin</a>
                    </div>
                <?php } ?>
                
                <div class="child <?= $page ==  "admin_users.php" ? 'active':''; ?>">
                    <i class="fas fa-user-friends"></i>
                    <a href="admin_users.php">Users</a>
                </div>
                <div class="child <?= $page ==  "admin_categories_page.php" ? 'active':''; ?>">
                    <i class="fa fa-th"></i>
                    <a href="admin_categories_page.php">Categories</a>
                </div>
                <div class="child <?= $page ==  "admin_products_page.php" ? 'active':''; ?>">
                    <i class="fas fa-glass-whiskey"></i>
                    <a href="admin_products_page.php">Products</a>
                </div>
            </div>
        </div>