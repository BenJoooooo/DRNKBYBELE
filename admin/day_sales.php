<?php
    session_start();

    // include ("../functions/middleware.php");
    include ('../functions/accessMiddleWareManager.php');
    include ("includes/header.php");

?>  

    <div class="wrapper">
            <?php include ('includes/sidebar.php'); ?>

            <div class="body-wrapper">
                <div class="admin-main-content">
                    <div class="admin-page-header">
                        <div class="admin-page-greet">
                            <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                        </div>
                        <div class="admin-page-title">
                            <h3>Sales Page</h3>
                        </div>
                    </div>
                    
                    <div class="admin-page-table">
                        <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                            <div class="card-header">
                                <h3>Sales Page</h3>

                                <form action="../functions/export.php" method="POST">
                                    <button type="submit" value="CSV" name="export_day_sales" class="btn btn-success">Export CSV</button>
                                </form>
                                
                                <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                            </div>

                            <div class="card-body" id="coverphotos_table">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>Days (Month/Date/Year)</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            $data = getTotalOfDays("orders");
                                            if(mysqli_num_rows($data) > 0) {

                                                foreach ($data as $item) { ?>

                                                    <tr>
                                                        <td>Date <?= $item['created_at']; ?></td>
                                                        <td><?= $item['total_price']; ?></td>
                                                        <td class="td-justify">
                                                            <a href="daily_sales?date=<?= $item['created_at'];?>" value="<?= $item['created_at'];?>" class="btn btn-success">View</a>

                                                            <form action="../functions/export.php" method="POST">
                                                                <button type="submit" value="<?= $item['created_at']; ?>" name="day_sales" class="btn btn-success">Export CSV</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                        <?php
                                                }

                                                $total = getTotalOfDaysPrice("orders");
                                                if(mysqli_num_rows($total) > 0) {
                                                    foreach($total as $total_price) {
                                        ?>

                                                    <tr>
                                                        <td>Total Sales</td>
                                                        <td><?= $total_price['total_price'] ?></td>
                                                    </tr>

                                        <?php 
                                                    }
                                                }   
                                            } else {
                                                
                                        ?>
                                                <div class="error-message-container">
                                                    <div class="product-not-available">
                                                        <h3 class="text-message">Sorry, this section is empty!</h3>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

    require ('includes/footer.php');

?>