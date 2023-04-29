<?php

    session_start();
    
    // include ('../functions/middleware.php');
    include ("../functions/accessMiddleWare.php");
    include ('includes/header.php');
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
                            <h3>Home Page Management</h3>
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
                                <h3>Home Page</h3>
                            </div>

                            <div class="card-body" id="coverphotos_table">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Added by</th>
                                            <th>Upload Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            $images = getAll("archive_espressyourself");
                                            if(mysqli_num_rows($images) > 0) {

                                                foreach ($images as $image) { ?>

                                                    <tr>
                                                        <!-- <td><?= $image['id']; ?></td> -->
                                                        <td><?= $image['name']; ?></td>
                                                        <td><?= $image['article']; ?></td>
                                                        <td><img src="../uploadsArchiveEspresso/<?= $image['image']; ?>" alt="<?= $image['name']; ?>"></td>
                                                        <td><?= $image['added_by']; ?></td>
                                                        <td><?= $image['created_at']; ?></td>
                                                        <td class="table-edit-delete">
                                                            <button type="button" class="btn btn-success recover_espress_btn" value="<?= $image['id']; ?>">Recover</button>
                                                            <button type="button" class="btn btn-danger delete_permanent_espress_btn" value="<?= $image['id']; ?>">Delete</button>
                                                        </td>
                                                    </tr>

                                        <?php
                                                }
                                            } else {
                                                // $_SESSION['message'] = "No records found";
                                        ?>
                                                <div class="error-message-container">
                                                    <div class="product-not-available">
                                                        <h3 class="text-message">Sorry, Archive Espressyourself is empty!</h3>
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

    include ('includes/footer.php');

?>