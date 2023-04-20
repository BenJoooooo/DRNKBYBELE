    
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
                    <a href="index">Home</a>
                </div>
                
                <div class="brand-child has-border <?= $page ==  "admin_manage_home.php" ? 'active':''; ?> ">
                    <div class="image-svg">
                        <i class="far fa-file-code"></i>
                    </div>
                    <a href="admin_manage_home">Manage</a>
                </div>

                <div class="brand-child <?= $page ==  "client_blog_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="client_blog_page">Client Blogs</a>
                </div>


                <div class="brand-child <?= $page ==  "blogs_industry_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="blogs_industry_page">Industry Blogs</a>
                </div>

                <div class="brand-child has-border <?= $page ==  "blogs_about_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <a href="blogs_about_page">About Blogs</a>
                </div>
                
                <?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'master') { ?>
                    <div class="brand-child <?= $page ==  "sales.php" ? 'active':''; ?>">
                        <div class="image-svg">
                            <i class="fas fa-poll"></i>
                        </div>
                        <a href="sales">Sales</a>
                    </div>
                <?php } ?>

                <!-- Orders divider and status dropdown -->
                <?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'master') { ?>

                    <div class="brand-child has-border show-dropdown">
                        <div class="image-svg">
                            <i class="fas fa-poll"></i>
                        </div>
                        <button href="orders_page">Orders Section<button>
                    </div>
                    
                    <div class="order-status-dropdown">
                        <div class="brand-child <?= $page ==  "orders_page.php" ? 'active':''; ?>">
                            <div class="image-svg"></div>
                            <a href="orders_page">All orders</a>
                        </div>
                        <div class="brand-child <?= $page ==  "orders_page_decline.php" ? 'active':''; ?>">
                            <div class="image-svg"></div>
                            <a href="orders_page_decline">Declined</a>
                        </div>
                        <div class="brand-child <?= $page ==  "orders_page_accept.php" ? 'active':''; ?>">
                            <div class="image-svg"></div>
                            <a href="orders_page_accept">Accepted</a>
                        </div>
                        <div class="brand-child <?= $page ==  "orders_page_deliver.php" ? 'active':''; ?>">
                            <div class="image-svg"></div>
                            <a href="orders_page_deliver">Delivery</a>
                        </div>
                        <div class="brand-child <?= $page ==  "orders_page_complete.php" ? 'active':''; ?>">
                            <div class="image-svg"></div>
                            <a href="orders_page_complete">Completed</a>
                        </div>
                        <div class="brand-child has-border <?= $page ==  "orders_page_failed.php" ? 'active':''; ?>">
                            <div class="image-svg"></div>
                            <a href="orders_page_failed">Failed</a>
                        </div>
                    </div>

                <?php } ?>
                <!-- Orders divider and status dropdown -->

                <?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'master') { ?>
                    <div class="brand-child <?= $page ==  "admin_admin.php" ? 'active':''; ?>">
                        <div class="image-svg">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <a href="admin_admin">Admin Account</a>
                    </div>
                <?php } ?>
                
                <?php if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'master') { ?>
                    <div class="brand-child has-border <?= $page ==  "admin_users.php" ? 'active':''; ?>">
                        <div class="image-svg">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="admin_users">User Account</a>
                    </div>
                <?php } ?>

                <div class="brand-child <?= $page ==  "admin_categories_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fa fa-th"></i>
                    </div>
                    <a href="admin_categories_page">Categories</a>
                </div>

                <div class="brand-child has-border <?= $page ==  "admin_products_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-glass-whiskey"></i>
                    </div>
                    <a href="admin_products_page">Products</a>
                </div>

                <!-- Drink Sizes -->
                <!-- <div class="brand-child has-border<?= $page ==  "admin_sizes_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-glass-whiskey"></i>
                    </div>
                    <a href="admin_sizes_page">Product Sizes</a>
                </div> -->
                <!-- Drink Sizes -->

                <div class="brand-child client <?= $page ==  "admin_products_page.php" ? 'active':''; ?>">
                    <div class="image-svg">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <a href="../index">Client</a>
                </div>

            </div>
        </div>
    </div>
</div>

        
    <script type="text/javascript">
        const toggleSideBar = () => document.body.classList.toggle("open");
    </script>