<?php

    session_start();
    
    include ('../functions/middleware.php');
    include ('includes/header.php');
    include ('includes/sidebar.php');

?>

        <div class="admin-main-content">
            <div class="admin-page-header">
                <div class="admin-page-greet">
                    <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                </div>
                <div class="admin-page-title">
                    <h3>Products Management</h3>
                </div>
            </div>
            
            <div class="admin-page-table">
                <div class="table-container">

                <!-- Session Message -->
                <?php include('../functions/sessionmessage.php'); ?>

                    <div class="table-button-add">
                        <a href="admin_add_new_products.php" class="table-container-add-new">Add Products</a>
                    </div>
                    <div class="card-header">
                        <h3>Products Table</h3>
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Added by</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                    $users = getUsers("users");
                                    if(mysqli_num_rows($users) > 0) {

                                        foreach ($users as $user) { ?>

                                            <tr>
                                                <td><?= $user['id']; ?></td>
                                                <td><?= $user['fullname']; ?></td>
                                                <td><?= $user['email']; ?></td>
                                                <td><?= $user['address']; ?></td>
                                                <td class="table-edit-delete">
                                                    <div class="table-button-add">
                                                        <a href="edit_user_account.php?id=<?= $user['id']; ?>" class="btn btn-primary">Edit</a>
                                                    </div>
                                                    <form action="../functions/codes.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?= $user['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" name="">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                <?php
                                        }
                                    } else {
                                        // $_SESSION['message'] = "No records found";
                                        echo "No records found";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

    include ('includes/footer.php');

?>