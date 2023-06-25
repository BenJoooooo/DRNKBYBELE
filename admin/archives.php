<?php

    session_start();
    
    include ('../functions/accessMiddleWare.php');
    include ('includes/header.php');

    $getDeletedUsers = getNumberOfDeleted("archive_users");
    $getDeletedOrders = getNumberOfDeleted("archive_orders");
    $getDeletedCovers = getNumberOfDeleted("archive_cover");
    $getDeletedClientBlogs = getNumberOfDeleted("archive_espressyourself");
    $getDeletedIndustryBlogs = getNumberOfDeleted("archive_blogsindustry");
    $getDeletedAboutBlogs = getNumberOfDeleted("archive_blogsabout");
    $getDeletedProducts = getNumberOfDeleted("archive_products");
    $getDeletedCategories = getNumberOfDeleted("archive_categories");

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
                        <h3>Archives</h3>
                    </div>
                </div>

                <div class="admin-card-container">
                    
                    <?php if(mysqli_num_rows($getDeletedUsers)) {
                            foreach($getDeletedUsers as $items) {
                    ?>
                        <a href="archives_page" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted Users</h5>
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

                    <?php 
                        }   
                    } ?>

                    <?php if(mysqli_num_rows($getDeletedOrders)) {
                            foreach($getDeletedOrders as $items) {
                    ?>
                        <a href="archives_orders" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted Orders</h5>
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

                    <?php 
                        }   
                    } ?>

                    <?php if(mysqli_num_rows($getDeletedCovers)) {
                            foreach($getDeletedCovers as $items) {
                    ?>
                        <a href="archive_cover" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted Cover Photo</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chalkboard"></i>
                                    </div>
                                </div>
                                <div class="button">
                                    <button>View All</button>
                                </div>
                            </div>
                        </a>

                    <?php 
                        }   
                    } ?>

                    <?php if(mysqli_num_rows($getDeletedClientBlogs)) {
                            foreach($getDeletedClientBlogs as $items) {
                    ?>
                        <a href="archive_espress" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted Espress Blog</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                </div>
                                <div class="button">
                                    <button>View All</button>
                                </div>
                            </div>
                        </a>

                    <?php 
                        }   
                    } ?>

                    <?php if(mysqli_num_rows($getDeletedIndustryBlogs)) {
                            foreach($getDeletedIndustryBlogs as $items) {
                    ?>
                        <a href="archive_blogs_industry" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted Industry Blog</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                </div>
                                <div class="button">
                                    <button>View All</button>
                                </div>
                            </div>
                        </a>

                    <?php 
                        }   
                    } ?>

                    <?php if(mysqli_num_rows($getDeletedAboutBlogs)) {
                            foreach($getDeletedAboutBlogs as $items) {
                    ?>
                        <a href="archive_blogs_about" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted About Blog</h5>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-newspaper"></i>
                                    </div>
                                </div>
                                <div class="button">
                                    <button>View All</button>
                                </div>
                            </div>
                        </a>

                    <?php 
                        }   
                    } ?>

                    <?php if(mysqli_num_rows($getDeletedProducts)) {
                            foreach($getDeletedProducts as $items) {
                    ?>
                        <a href="archive_products" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted Products</h5>
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

                    <?php 
                        }   
                    } ?>

                    <?php if(mysqli_num_rows($getDeletedCategories)) {
                            foreach($getDeletedCategories as $items) {
                    ?>
                        <a href="archive_categories" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_sum'] ?></h4>
                                        <h5>Deleted Categories</h5>
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

                    <?php 
                        }   
                    } ?>


                </div>
            </div>
        </div>
    </div>

<?php
    include ('includes/footer.php');
?>