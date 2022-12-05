<?php

    session_start();
    
    include ('../functions/middleware.php');
    include ('includes/header.php');

    $adminCount = getAdmin("users");
    $getAdminCount = mysqli_num_rows($adminCount);

    $userCount = getUsers("users");
    $getUserCount = mysqli_num_rows($userCount);

    $categoriesCount = getAll("categories");
    $getCategoriesCount = mysqli_num_rows($categoriesCount);

    $productsCount = getAll("products");
    $getProductsCount = mysqli_num_rows($productsCount);

?>
    <div class="wrapper">
        <?php include ('includes/sidebar.php'); ?>

        <div class="body-wrapper">
            
            <div class="admin-main-content">
                
                <!-- Session Message -->
                <?php include('../functions/sessionmessage.php'); ?>
            
                <div class="admin-page-header">
                    <div class="admin-page-greet">
                        <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                    </div>
                    <div class="admin-page-title">
                        <h3>Dashboard</h3>
                    </div>
                </div>

                <div class="admin-card-container">
                    <a href="admin_admin.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h4><?php print_r($getAdminCount); ?></h4>
                                    <h5>Admin</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-cog"></i>
                                </div>
                            </div>
                            <div class="button">
                                <button>View All</button>
                            </div>
                        </div>
                    </a>

                    <a href="admin_users.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h4><?php print_r($getUserCount); ?></h4>
                                    <h5>Users</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-friends"></i>
                                </div>
                            </div>
                            <div class="button">
                                <button>View All</button>
                            </div>
                        </div>
                    </a>

                    <a href="admin_categories_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h4><?php print_r($getCategoriesCount); ?></h4>
                                    <h5>Categories</h5>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-th"></i>
                                </div>
                            </div>
                            <div class="button">
                                <button>View All</button>
                            </div>
                        </div>
                    </a>

                    <a href="admin_products_page.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h4><?php print_r($getProductsCount); ?></h4>
                                    <h5>Products</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-glass-whiskey"></i>
                                </div>
                            </div>
                            <div class="button">
                                <button>View All</button>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h4>Dummy</h4>
                                    <h5>Income</h5>
                                </div>
                                <div class="icon">
                                    <i class="	fas fa-money-check"></i>
                                </div>
                            </div>
                            <div class="button">
                                <button>View All</button>
                            </div>
                        </div>
                    </a>

                    <a href="" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h4>Dummy</h4>
                                    <h5>Orders</h5>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-basket"></i>
                                </div>
                            </div>
                            <div class="button">
                                <button>View All</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
    include ('includes/footer.php');
?>