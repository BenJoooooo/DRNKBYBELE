<?php

    session_start();
    
    include ('../functions/middleware.php');
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
                        <h3>Products Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                        <div class="table-button-add">
                            <a href="admin_add_new_products" class="table-container-add-new">Add Products</a>
                            <input type="text" id="live_search" class="search-input-admin" placeholder="Search here">
                        </div>

                        <div class="card-header">
                            <h3>Products Table</h3>
                        </div>

                        <div class="card-body" id="products_table">
                            <table>
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Size</th>

                                        <?php if($_SESSION['role'] == 'admin') { ?>
                                            <th>Original Price</th>
                                        <?php } ?>

                                        <th>Selling Price</th>
                                        <th>Image</th>
                                        <!-- <th>Slug</th> -->
                                        <!-- <th>Description</th> -->
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th>Created at</th>
                                        <th>Added by</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $products = getProductAndCategory("products", "categories");
                                        if(mysqli_num_rows($products) > 0) {

                                            foreach ($products as $product) { ?>

                                                <tr>
                                                    <!-- <td><?= $product['product_id']; ?></td> -->
                                                    <!-- <td><?= $product['category_id']; ?></td> -->
                                                    <td><?= $product['cat_name']; ?></td>
                                                    <td><?= $product['name']; ?></td>
                                                    <td><?= $product['size']; ?></td>

                                                    <?php if($_SESSION['role'] == 'admin') { ?>
                                                        <td><?= $product['original_price']; ?></td>
                                                    <?php } ?>

                                                    <td><?= $product['selling_price']; ?></td>
                                                    <td><img src="../uploadsProducts/<?= $product['image']; ?>" alt=""></td>
                                                    <!-- <th><?= $product['slug']; ?></th> -->
                                                    <!-- <td><?= $product['description']; ?></td> -->
                                                    <td><?= $product['status'] == 0 ? "Visible":"Hidden"; ?></td>
                                                    <td><?= $product['featured'] == 0 ? "False":"True"; ?></td>
                                                    <td><?= $product['created_at']; ?></td>
                                                    <td><?= $product['added_by']; ?></td>
                                                    <td class="table-edit-delete">
                                                        <div class="table-button-add">
                                                            <a href="edit_products_page?id=<?= $product['product_id']; ?>" class="btn btn-primary">Edit</a>
                                                        </div>
                                                        <button type="button" class="btn btn-danger delete_product_btn" value="<?= $product['product_id']; ?>">Delete</button>
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