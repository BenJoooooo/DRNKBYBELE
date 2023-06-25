<?php
    session_start();

    // include ("../functions/middleware.php");
    include ('../functions/accessMiddleWareManager.php');
    include ("includes/header.php");

?>  

    <div class="wrapper" id="wrapper">
            <?php include ('includes/sidebar.php'); ?>

            <div class="body-wrapper">
                <div class="admin-main-content">
                    <div class="admin-page-header">
                        <div class="admin-page-greet">
                            <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                        </div>
                        <div class="admin-page-title">
                            <h3>Loyal Customers</h3>
                        </div>
                    </div>
                    
                    <div class="admin-page-table">
                        <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                            <div class="card-header">
                                <h3>Frequent visitors</h3>
                                <div>
                                    <i class="fa fa-search"></i>
                                    <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                                </div>
                            </div>

                            <div class="card-body" id="coverphotos_table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            $data = getLoyalCust();
                                            if(mysqli_num_rows($data) > 0) {

                                                foreach ($data as $item) { ?>

                                                    <tr>
                                                        <td><?= $item['uid']; ?></td>
                                                        <td><?= $item['uname']; ?></td>
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