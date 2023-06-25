<?php

    session_start();
    
    // include ('../functions/middleware.php');
    include ("../functions/accessMiddleWareManager.php");
    include ('includes/header.php');
    include ('includes/sidebar.php');

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
                        <h3>User Accounts Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                    <!-- Session Message -->
                    <?php include('../functions/sessionmessage.php'); ?>

                        <div class="table-button-add">
                            <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                        </div>
                        <div class="card-header">
                            <h3>Archived Accounts Table</h3>
                        </div>

                        <div class="card-body" id="user_table">
                            <table>
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $users = getAllUsers("archive_users");
                                        if(mysqli_num_rows($users) > 0) {

                                            foreach ($users as $user) { ?>

                                                <tr>
                                                    <!-- <td><?= $user['id']; ?></td> -->
                                                    <td><?= $user['fullname']; ?></td>
                                                    <td><?= $user['email']; ?></td>
                                                    <td><?= $user['address']; ?></td>
                                                    <td><?= $user['role']; ?></td>
                                                    <td class="table-edit-delete">
                                                        <button type="button" class="btn btn-success recover_user_btn" value="<?= $user['id']; ?>">Recover</button>
                                                        <button type="button" class="btn btn-danger delete_user_permanent_btn" value="<?= $user['id']; ?>">Permanently Delete</button>
                                                    </td>
                                                </tr>

                                    <?php
                                            }
                                        } else {
                                            // $_SESSION['message'] = "No records found";
                                    ?>
                                            <div class="error-message-container">
                                                <div class="product-not-available">
                                                    <h3 class="text-message">Sorry, Users table is empty!</h3>
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

<?php

    include ('includes/footer.php');

?>