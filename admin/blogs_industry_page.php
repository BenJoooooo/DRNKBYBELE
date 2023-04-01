<?php 

    session_start();
    include ('../functions/middleware.php');
    include ('../functions/middleware_manager.php');
    include ('includes/header.php')

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
                        <h3>Internal Blogs Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table" id="coverphotos_table">
                    <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                        <div class="table-button-add">
                            <a href="blogs_industry_add_new.php" class="table-container-add-new">Add Blogs</a>
                            <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                        </div>
                        <div class="card-header">
                            <h3>Accounts Table</h3>
                        </div>

                        <div class="card-body" id="useradmin_table">
                            <table>
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Blog Title</th>
                                        <th>Description</th>
                                        <th>Slug</th>
                                        <th>Visibility</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Author</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $blogs = getAll("blogsindustry");
                                        if(mysqli_num_rows($blogs) > 0) {

                                            foreach ($blogs as $blog) { ?>

                                                <tr>
                                                    <!-- <td><?= $blog['id']; ?></td> -->
                                                    <td><?= $blog['title']; ?></td>
                                                    <td><?= $blog['description']; ?></td>
                                                    <td><?= $blog['slug']; ?></td>
                                                    <td><?= $blog['posted'] == 0 ? "Visible":"Hidden";?></td>
                                                    <td><img src="../uploadsBlogs/<?= $blog['image']; ?>" alt=""></td>
                                                    <td><?= $blog['exact_created_at']; ?></td>
                                                    <td><?= $blog['added_by']; ?></td>
                                                    <td class="table-edit-delete">
                                                        <div class="table-button-add">
                                                            <a href="blogs_industry_edit.php?id=<?= $blog['id']; ?>" class="btn btn-primary">Edit</a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger delete_blogs_industry" value="<?= $blog['id']; ?>">Delete</button>

                                                    </td>
                                                </tr>

                                    <?php
                                            }
                                        } else {
                                            // $_SESSION['message'] = "No records found";
                                            ?>
                                            
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