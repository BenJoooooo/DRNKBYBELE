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
                    <h3>Categories Management</h3>
                </div>
            </div>
            
            <div class="admin-page-table">
                <div class="table-container">

                <!-- Session Message -->
                <?php include('../functions/sessionmessage.php'); ?>

                    <div class="table-button-add">
                        <a href="admin_add_new_categories.php" class="table-container-add-new">Add Categories</a>
                    </div>
                    <div class="card-header">
                        <h3>Categories Table</h3>
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
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
                                    $category_data = getAll("categories");
                                    if(mysqli_num_rows($category_data) > 0) {

                                        foreach ($category_data as $data) { ?>

                                            <tr>
                                                <td><?= $data['id']; ?></td>
                                                <td><?= $data['name']; ?></td>
                                                <td><img src="../uploadsCategories/<?= $data['image']; ?>" alt=""></td>
                                                <td><?= $data['description']; ?></td>
                                                <td><?= $data['status'] == 0 ? "Visible":"Hidden"; ?></td>
                                                <td><?= $data['created_at']; ?></td>
                                                <td><?= $data['added_by']; ?></td>
                                    
                                                <td class="table-edit-delete">
                                                    <div class="table-button-add">
                                                        <a href="edit_categories.php?id=<?= $data['id']; ?>" class="btn btn-primary">Edit</a>
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