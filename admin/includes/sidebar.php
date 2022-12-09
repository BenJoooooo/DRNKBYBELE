    
<?php 
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>

    <div class="admin-wrapper">
        <div class="admin-menu">
            <div class="admin-brand">
                <div class="image-svg">
                    <button type="button" onclick="toggleSideBar()">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="svg"  viewBox="0 0 50 50" width="25px" height="25px"><path d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z"/></svg>

                    </button>
                </div>
                <h1 class="admin-menu-title">DRNK BY BELE</h1>
            </div>

            <div class="admin-links">

                <div class="brand-child <?= $page ==  "index.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fa fa-home"></i>
                    </div>
                    <a href="index.php">Home</a>
                </div>
                
                <div class="brand-child has-border <?= $page ==  "admin_manage_home.php" ? 'active':''; ?> ">
                    <div class="image-svg">
                        <i class="far fa-file-code"></i>
                    </div>
                    <a href="admin_manage_home.php">Manage</a>
                </div>

                <div class="brand-child <?= $page ==  "blogs.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="blogs.php">Client Blogs</a>
                </div>


                <div class="brand-child <?= $page ==  "blogs_industry_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="blogs_industry_page.php">Industry Blogs</a>
                </div>

                <div class="brand-child has-border <?= $page ==  "blogs_about_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="blogs_about_page.php">About Blogs</a>
                </div>
                
                <div class="brand-child <?= $page ==  "sales.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-poll"></i>
                    </div>
                    <a href="sales.php">Sales</a>
                </div>

                <div class="brand-child has-border <?= $page ==  "sales.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-poll"></i>
                    </div>
                    <a href="sales.php">Orders</a>
                </div>
                
                <?php if($_SESSION['role'] == 'admin') { ?>
                    <div class="brand-child <?= $page ==  "admin_admin.php" ? 'active':''; ?>">
                        <div class="image-svg">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <a href="admin_admin.php">Admin Account</a>
                    </div>
                <?php } ?>
                
                <div class="brand-child has-border <?= $page ==  "admin_users.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <a href="admin_users.php">User Account</a>
                </div>

                <div class="brand-child <?= $page ==  "admin_categories_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fa fa-th"></i>
                    </div>
                    <a href="admin_categories_page.php">Categories</a>
                </div>

                <div class="brand-child has-border <?= $page ==  "admin_products_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-glass-whiskey"></i>
                    </div>
                    <a href="admin_products_page.php">Products</a>
                </div>

                <div class="brand-child client <?= $page ==  "admin_products_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <a href="../index.php">Client</a>
                </div>

            </div>
        </div>
    </div>
</div>

        
    <script type="text/javascript">
        const toggleSideBar = () => document.body.classList.toggle("open");
    </script>