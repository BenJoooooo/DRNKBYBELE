<?php

    session_start();
    
    include ('../functions/accessMiddleWareRider.php');
    include ('includes/header.php');

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
                        <h3>Sales Page</h3>
                    </div>
                </div>

                <div class="admin-card-container">

                    <a href="product_sales_medium.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h5>Medium Sized Products</h5>
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

                    <a href="product_sales_large.php" class="admin-card-link">
                        <div class="admin-card">
                            <div class="card-wrapper">
                                <div class="details">
                                    <h5>Large Sized Products</h5>
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

<?php
    include ('includes/footer.php');
?>