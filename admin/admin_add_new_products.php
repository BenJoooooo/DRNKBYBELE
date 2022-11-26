<?php

    session_start();
    
    include ('../functions/middleware.php');
    include ('includes/header.php');
    include ('includes/sidebar.php');

?>

        <div class="admin-main-content-add-page">
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

                    <div class="card-header">
                        <h3>Create New Product
                            <a href="admin_products_page.php" class="btn px-4 btn-light float-end">Back</a>
                        </h3>
                    </div>

                    <div class="signup-card-body">
                        <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">
                            <div class="signup-role">
                                <div class="signup price">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="signup-input" required placeholder="Enter Product Name">
                                </div>
                                <div class="signup price">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="signup-input" required placeholder="e.g., milktea-series">
                                </div>
                            </div>
                            <div class="signup">
                                <label for="">Select Category</label>
                                <select name="category_id" id="" class="signup-input">
                                    <option selected>Select Product Category</option>
                                    <?php 
                                        $categories = getAll("categories");
                                        if(mysqli_num_rows($categories) > 0) {
                                            foreach ($categories as $item) {
                                                ?>
                                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo "No Category Available";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="signup">
                                <label for="">Description</label>
                                <input type="text" name="description" class="signup-input" required placeholder="Enter Description">
                            </div>
                            <div class="signup">
                                <label for="">Upload Image</label>
                                <input type="file" name="upload" class="signup-input" required multiple placeholder="Upload an image">
                            </div>
                            <div class="signup-role">
                                <div class="signup price">
                                    <label for="">Original Price</label>
                                    <input type="number" name="original_price" class="signup-input" placeholder="&#8369">
                                </div>
                                <div class="signup price">
                                    <label for="">Selling Price</label>
                                    <input type="number" name="selling_price" class="signup-input" placeholder="&#8369">
                                </div>
                            </div>
                            <div class="signup-role">
                                <div class="signup admin-role">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" class="signup-input">
                                </div>
                                <div class="signup admin-role">
                                    <label for="">Featured</label>
                                    <input type="checkbox" name="featured" class="signup-input">
                                </div>
                            </div>
                            
                            <input type="hidden" name="added_by" value="<?= $_SESSION['auth_user']['fullname']; ?>">
                            
                            <button class="signup-submit" name="add_product_submit">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../functions/passwordIcon.js"></script>
    <script src="../functions/repeat-password.js"></script>

<?php

    
    include ('includes/footer.php');

?>