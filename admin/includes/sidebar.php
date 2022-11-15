    
    
    <div class="admin-wrapper-content">
        <div class="admin-side-menu">
            <div class="admin-side-menu-brand">
                <h1 class="admin-side-menu-title">Drnk by Bele </h1>
            </div>
            <div class="admin-side-menu-links">
                <div class="child-menu">
                    <h4>Menu</h4>
                </div>
                <div class="child">
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home</a>
                </div>
                <div class="child">
                    <i class="far fa-file-code"></i>
                    <a href="admin_manage_home.php">Manage</a>
                </div>
                <div class="child">
                    <i class="fas fa-file-invoice"></i>
                    <a href="index.php">Blogs</a>
                </div>
                <div class="child">
                    <i class="fas fa-poll"></i>
                    <a href="index.php">Sales</a>
                </div>
                
                <?php if($_SESSION['role'] == 'admin') { ?>
                    <div class="child">
                        <i class="fas fa-user-cog"></i>
                        <a href="admin_admin.php">Admin</a>
                    </div>
                <?php } ?>
                
                <div class="child">
                    <i class="fas fa-user-friends"></i>
                    <a href="admin_users.php">Users</a>
                </div>
                <div class="child">
                    <i class="fa fa-th"></i>
                    <a href="index.php">Categories</a>
                </div>
                <div class="child">
                    <i class="fas fa-glass-whiskey"></i>
                    <a href="admin_products_page.php">Products</a>
                </div>
            </div>
        </div>