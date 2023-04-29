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
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                            <th>Price</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php 

                                        if(isset($_GET['date'])) {
                                            $date = $_GET['date'];

                                            $result = checkDateDetails("orders", $date);
                                            if(mysqli_num_rows($result) > 0) {

                                                foreach($result as $item) {
                                        ?>

                                                    <tr>
                                                        <td><?= $item['id']; ?></td>
                                                        <td><?= $item['tracking_no']; ?></td>
                                                        <td>
                                                            <?php 
                                                                if($item['status'] == 0) {
                                                                    echo "Pending";
                                                                } elseif($item['status'] == 1) {
                                                                    echo "Declined";
                                                                } elseif($item['status'] == 2) {
                                                                    echo "Processing";
                                                                } elseif($item['status'] == 3) {
                                                                    echo "Completed";
                                                                } elseif($item['status'] == 4) {
                                                                    echo "Delivery";
                                                                } elseif($item['status'] == 5) {
                                                                    echo "Order Failed";
                                                                } else {
                                                                    echo "Error";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?= $item['created_at']; ?></td>
                                                        <td class="td-justify">
                                                            <a href="../view_order_admin?id=<?= $item['tracking_no']; ?>" value="<?= $item['id']; ?>" class="btn btn-success">View</a>
                                                        </td>
                                                        <td><?= $item['total_price']; ?></td>
                                                    </tr>

                                        <?php
                                            }
                                        }

                                        $total = checkDateTotal("orders", $date);
                                            if(mysqli_num_rows($total) > 0) {
                                                foreach($total as $total_price) { ?>
                                                    
                                                    <tr>
                                                        <td>Total Sales</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?= $total_price['total_price']; ?></td>
                                                    </tr>

                                        <?php   }
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