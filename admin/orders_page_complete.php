<?php
    session_start();

    // include ("../functions/middleware.php");
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
                                            $data = getOrdersByComplete("orders");
                                            if(mysqli_num_rows($data) > 0) {

                                                foreach ($data as $item) { ?>

                                                    <tr>
                                                        <td><?= $item['id']; ?></td>
                                                        <td><?= $item['tracking_no']; ?></td>
                                                        <td><?= $item['total_price']; ?></td>

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

                                                        <td><?= $item['date_created']; ?></td>
                                                        <td class="td-justify">
                                                            <a href="../view_order_admin?id=<?= $item['tracking_no']; ?>" value="<?= $item['id']; ?>" class="btn btn-success">View</a>
                                                            <button class="btn btn-danger declineOrder" value="<?= $item['id']; ?>">Decline</button>
                                                            <button class="btn btn-info acceptOrder" value="<?= $item['id']; ?>">Accept</button>
                                                            <button class="btn btn-primary deliverOrder" value="<?= $item['id']; ?>">Deliver</button>
                                                            <button class="btn btn-danger failOrder" value="<?= $item['id']; ?>">Failed</button>
                                                        </td>

                                                    </tr>

                                        <?php
                                                }
                                            } else {
                                                // $_SESSION['message'] = "No records found";
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