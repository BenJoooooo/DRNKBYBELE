<?php

    session_start();
    
    include ('../functions/accessMiddleWare.php');
    include ('includes/header.php');

    $assumed_sales = getAssumedSales("orders");
    $totalSales = getTotalSalesComplete("orders");
    $totalSalesToday = getTotalSalesToday("orders");
    $monthSales = getMonthSale("orders");
    $weekSales = getTotalOfWeek("orders");
    $dayTotal = getTotalOfDay("orders");

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

                    <?php if(mysqli_num_rows($assumed_sales)) {
                        foreach($assumed_sales as $items) {
                    ?>
                        <a href="assumed_sales_page" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_price']; ?></h4>
                                        <h5>Assumed Sales</h5>
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

                    <?php if(mysqli_num_rows($totalSales)) {
                        foreach($totalSales as $items) {
                    ?>
                        <a href="all_sales_page" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_price']; ?></h4>
                                        <h5>Total Sales</h5>
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

                    <?php if(mysqli_num_rows($monthSales)) {
                        foreach($monthSales as $items) {
                    ?>
                        <a href="month_sales" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_price']; ?></h4>
                                        <h5>Monthly Sales</h5>
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

                    <?php if(mysqli_num_rows($weekSales)) {
                        foreach($weekSales as $items) {
                    ?>
                        <a href="week_sales" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_price']; ?></h4>
                                        <h5>Weekly Sales</h5>
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

                    <?php if(mysqli_num_rows($dayTotal)) {
                        foreach($dayTotal as $items) {
                    ?>
                        <a href="day_sales" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_price']; ?></h4>
                                        <h5>Daily Sales</h5>
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

                    <?php if(mysqli_num_rows($totalSalesToday)) {
                        foreach($totalSalesToday as $items) {
                    ?>

                        <a href="sales_page" class="admin-card-link">
                            <div class="admin-card">
                                <div class="card-wrapper">
                                    <div class="details">
                                        <h4><?= $items['total_price']; ?></h4>
                                        <h5>Sales Today</h5>
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
                </div>

            </div>
        </div>
    </div>

<?php
    include ('includes/footer.php');
?>