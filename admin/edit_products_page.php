<?php

    session_start();
    
    include ('../functions/middleware.php');
    include ('includes/header.php');
    include ('includes/sidebar.php');

?>
    <div class="wrapper">
        <?php include ('includes/sidebar.php'); ?>

        <div class="body-wrapper">
            <div class="admin-main-content-add-page">
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

                        <?php if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $getProduct = getById("products", $id);
                            if(mysqli_num_rows($getProduct) > 0) {
                                $data = mysqli_fetch_array($getProduct);
                        ?>

                        <div class="card-header">
                            <h3>Edit Product
                                <a href="admin_products_page.php" class="btn px-4 btn-light float-end">Back</a>
                            </h3>
                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">

                                <div class="signup-role">
                                    <div class="signup price">
                                        <label for="">Product Name</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" class="signup-input" required placeholder="Enter Product Name">
                                    </div>
                                    <div class="signup price">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug']; ?>" class="signup-input" required placeholder="e.g., wintermelon-milktea">
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
                                                        <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected':''; ?> > <?= $item['name']; ?> </option>
                                                    <?php
                                                }
                                            } else {
                                                echo "No Category Available";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <input type="hidden" name="product_id" value="<?= $data['id']; ?> ">

                                <div class="signup">
                                    <label for="">Description</label>
                                    <input type="text" name="description" value="<?= $data['description'] ?>" class="signup-input" required placeholder="Enter Description">
                                </div>
                                <div class="signup">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="upload" class="signup-input" multiple placeholder="Upload an image">
                                    <label for="">Current Image</label>
                                    <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                    <img src="../uploadsProducts/<?= $data['image']; ?>" alt="">
                                </div>
                                <div class="signup-role">
                                    <div class="signup price">
                                        <label for="">Original Price</label>
                                        <input type="number" name="original_price" value="<?= $data['original_price']; ?>" class="signup-input" placeholder="&#8369">
                                    </div>
                                    <div class="signup price">
                                        <label for="">Selling Price</label>
                                        <input type="number" name="selling_price" value="<?= $data['selling_price']; ?>" class="signup-input" placeholder="&#8369">
                                    </div>
                                </div>
                                <div class="signup-role">
                                    <div class="signup admin-role">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $data['status'] == '0' ? '':'checked'; ?> class="signup-input">
                                    </div>
                                    <div class="signup admin-role">
                                        <label for="">Featured</label>
                                        <input type="checkbox" name="featured" <?= $data['featured'] == '0' ? '':'checked'; ?> class="signup-input">
                                    </div>
                                </div>
                                
                                <input type="hidden" name="added_by" value="<?= $_SESSION['auth_user']['fullname']; ?>">
                                
                                <button class="signup-submit" name="update_product_submit">Edit Product</button>
                            </form>
                        </div>

                        <?php
                            } else {
                                echo "Product not found for given ID";
                            }
                        } else {
                            echo "Missing ID from URL";
                        }
                        ?>
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