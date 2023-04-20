<?php

    session_start();
    
    // include ('../functions/middleware.php');
    include ("../functions/accessMiddleWare.php");
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
                        <h3>Cup Sizes Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                        <div class="table-button-add">
                            <a href="admin_add_sizes" class="table-container-add-new">Add Sizes & Price</a>
                        </div>
                        <div class="card-header">
                            <h3>Sizes and Price Table</h3>
                        </div>

                        <div class="card-body" id="sizes_table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Size</th>
                                        <th>Size Price</th>
                                        <th>Created at</th>
                                        <th>Added by</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $size = getAll("sizes");
                                        if(mysqli_num_rows($size) > 0) {

                                            foreach ($size as $sizes) { ?>

                                                <tr>
                                                    <td><?= $sizes['id']; ?></td>
                                                    <td><?= $sizes['size']; ?></td>
                                                    <td><?= $sizes['size_price']; ?></td>
                                                    <td><?= $sizes['created_at']; ?></td>
                                                    <td><?= $sizes['added_by']; ?></td>
                                                    <td class="table-edit-delete">
                                                        <div class="table-button-add">
                                                            <a href="edit_sizes_page?id=<?= $sizes['id']; ?>" class="btn btn-primary">Edit</a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger delete_sizes_btn" value="<?= $sizes['id']; ?>">Delete</button>
                                                    </td>
                                                </tr>

                                    <?php
                                            }
                                        } else {
                                            // $_SESSION['message'] = "No records found";
                                    ?>
                                            <div class="error-message-container">
                                                <div class="sizes-not-available">
                                                    <h3 class="text-message">Sorry, Cup Sizes & Price table is empty!</h3>
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