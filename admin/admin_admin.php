<?php

    session_start();
    
    include ('../functions/middleware.php');

    if($_SESSION['role'] != 'admin') {
        redirect("index.php", "You are not authorized to access the page");
    }

    include ('includes/header.php');
    include ('includes/sidebar.php');

?>

        <div class="admin-main-content">
            <div class="admin-page-header">
                <div class="admin-page-greet">
                    <h4>Welcome, <?= $_SESSION['auth_user']['fullname'];  ?></h4>
                </div>
                <div class="admin-page-title">
                    <h3>Admin Accounts Management</h3>
                </div>
            </div>
            
            <div class="admin-page-table">
                <div class="table-container">

                    <div class="signup_message">
                        <?php if (isset($_SESSION['message'])) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <bold>Hey! </bold><?= $_SESSION['message'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php unset($_SESSION['message']); } ?>
                    </div>

                    <div class="table-button-add">
                        <a href="admin_add_new_account.php" class="table-container-add-new">Add User</a>
                    </div>
                    <div class="card-header">
                        <h3>Accounts Table</h3>
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                    $users = getAdmin("users");
                                    if(mysqli_num_rows($users) > 0) {

                                        foreach ($users as $user) { ?>

                                            <tr>
                                                <td><?= $user['id']; ?></td>
                                                <td><?= $user['fullname']; ?></td>
                                                <td><?= $user['email']; ?></td>
                                                <td><?= $user['address']; ?></td>
                                                <td><?= $user['role']; ?></td>
                                                <td class="table-edit-delete">
                                                    <div class="table-button-add">
                                                        <a href="edit_admin_account.php?id=<?= $user['id']; ?>" class="btn btn-primary">Edit</a>
                                                    </div>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?= $user['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
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