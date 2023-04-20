<?php
    session_start();

    include ("../functions/accessMiddleWareManager.php");
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
                            <h3>Orders Page</h3>
                        </div>
                    </div>
                    
                    <div class="admin-page-table">
                        <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                            <div class="card-header">
                                <h3>Orders Page</h3>
                                <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                            </div>

                            <div class="card-body" id="coverphotos_table">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>Order Id</th>
                                            <th>Tracking No</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 

                                        if(isset($_GET['created_at'])) {

                                            $created_at = $_GET['created_at'];
                                            $resultTracking = checkDateDetails($date);
                                            if(mysqli_num_rows($resultTracking) > 0) {
                                                foreach($resultTracking as $item)
                                        ?>

                                                    <tr>
                                                        <td><?= $item['id']; ?></td>
                                                        <td><?= $item['tracking_no']; ?></td>
                                                        <td><?= $item['total_price']; ?></td>

                                                        <td>
                                                          
                                                        </td>

                                                        <td><?= $item['created_at']; ?></td>

                                                    </tr>

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


    } else {

    ?>
        <div class="error-message-container">
            <div class="product-not-available">
                <h3 class="text-message">Something Went Wrong!</h3>
            </div>
        </div>
    <?php
    }

    require ('includes/footer.php');

?>