<?php

    session_start();
    
    include ('../functions/accessMiddleWareRider.php');
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
                            <h3>External Blog Management</h3>
                        </div>
                    </div>
                    
                    <div class="admin-page-table">
                        <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                            <div class="card-header">
                                <h3>Home Page</h3>
                                <div>
                                    <i class="fa fa-search"></i>
                                    <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                                </div>
                            </div>

                            <div class="card-body" id="coverphotos_table">
                                <table>
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>title</th>
                                            <th>Article</th>
                                            <th>Image</th>
                                            <th>Added by</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            $rows = getAll("espressyourself");
                                            if(mysqli_num_rows($rows) > 0) {

                                                foreach ($rows as $row) { ?>

                                                    <tr>
                                                        <!-- <td><?= $row['id']; ?></td> -->
                                                        <td><?= $row['title']; ?></td>
                                                        <td><?= $row['article']; ?></td>
                                                        <td><img src="../uploadsEspresso/<?= $row['image']; ?>" alt="<?= $row['name']; ?>"></td>
                                                        <td><?= $row['added_by']; ?></td>
                                                        <td><?= $row['created_at']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger delete_espress" value="<?= $row['id']; ?>">Delete</button>
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

    include ('includes/footer.php');

?>