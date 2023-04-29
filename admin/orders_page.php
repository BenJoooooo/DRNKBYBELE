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
                                            $data = getOrdersByStatus("orders");
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

                                                        <td><?= $item['created_at']; ?></td>
                                                        <td class="td-justify">
                                                            <a href="../view_order_admin?id=<?= $item['tracking_no']; ?>" value="<?= $item['id']; ?>" class="btn btn-success">View</a>
                                                            <button class="btn btn-danger declineOrder" value="<?= $item['id']; ?>">Decline</button>
                                                            <button class="btn btn-info acceptOrder" value="<?= $item['id']; ?>">Accept</button>
                                                            <button class="btn btn-primary deliverOrder" value="<?= $item['id']; ?>">Deliver</button>
                                                            <button class="btn btn-dark completeOrder" value="<?= $item['id']; ?>">Complete</button>


                                                            <!-- <form action="" method="POST">
                                                                <input type="hidden" value="<?= $item['id']; ?>">
                                                                <select name="order_status" id="" value="<?= $item['id']; ?>" class="order-id">
                                                                    <option value="0" <?= $item['status'] == 0 ? "selected":"" ?>>Pending</option>
                                                                    <option value="1" <?= $item['status'] == 1 ? "selected":"" ?>>Decline</option>
                                                                    <option value="2" <?= $item['status'] == 2 ? "selected":"" ?>>Accept</option>
                                                                    <option value="3" <?= $item['status'] == 3 ? "selected":"" ?>>Complete</option>
                                                                    <option value="4" <?= $item['status'] == 4 ? "selected":"" ?>>Deliver</option>
                                                                </select>
                                                                <button type="submit" name="update_order_btn" class="btn btn-primary updateStatus">Update status</button>
                                                            </form> -->
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