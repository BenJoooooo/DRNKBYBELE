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
                    <h3>Home Page Management</h3>
                </div>
            </div>
            
            <div class="admin-page-table">
                <div class="table-container">

                <!-- Session Message -->
                <?php include('../functions/sessionmessage.php'); ?>

                    <div class="table-button-add">
                        <a href="admin_add_new_image.php" class="table-container-add-new">Add Cover Photo</a>
                    </div>
                    <div class="card-header">
                        <h3>Home Page</h3>
                    </div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image ID</th>
                                    <th>Image name</th>
                                    <th>Image Description</th>
                                    <th>Image</th>
                                    <th>Added by</th>
                                    <th>Upload Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                    $images = getAll("images");
                                    if(mysqli_num_rows($images) > 0) {

                                        foreach ($images as $image) { ?>

                                            <tr>
                                                <td><?= $image['id']; ?></td>
                                                <td><?= $image['name']; ?></td>
                                                <td><?= $image['description']; ?></td>
                                                <td><img src="../uploads/<?= $image['image']; ?>" alt="<?= $image['name']; ?>"></td>
                                                <td><?= $image['added_by']; ?></td>
                                                <td><?= $image['created_at']; ?></td>
                                                <td class="table-edit-delete">
                                                    <div class="table-button-add">
                                                        <a href="edit_homepage.php?id=<?= $image['id']; ?>" class="btn btn-primary">Edit</a>
                                                    </div>
                                                    <form action="../functions/codes.php" method="POST">
                                                        <input type="hidden" name="image_id" value="<?= $image['id']; ?>">
                                                        <button type="submit" class="btn btn-danger" name="deletephoto_btn">Delete</button>
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