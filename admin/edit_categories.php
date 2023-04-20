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

                        <?php if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $getCategory = getById("categories", $id);

                            if(mysqli_num_rows($getCategory) > 0) {
                                $data = mysqli_fetch_array($getCategory);
                        ?>

                        <div class="card-header">
                            <h3>Edit Category</h3>
                            <a href="admin_categories_page" class="btn px-4 btn-light float-end">Back</a>
                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">
                                <div class="signup-role">
                                    <div class="signup price">
                                        <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
                                        <label for="">Category Name</label>
                                        <input type="text" name="name" value="<?= $data['name']; ?>" class="signup-input" required placeholder="Enter Category Name">
                                    </div>
                                    <div class="signup price">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" class="signup-input" value="<?= $data['slug']; ?>" required placeholder="e.g., milktea-series">
                                    </div>
                                </div>
                                <div class="signup fullname">
                                    <label for="">Description</label>
                                    <!-- <input type="text" name="description" value="<?= $data['description']; ?>" class="signup-input" required placeholder="Enter Description"> -->
                                    <textarea name="description" cols="30" rows="10" class="signup-input" placeholder="Write description" id="my-text" maxlength="800" required><?= $data['description']; ?></textarea>
                                    <p id="count-result" class="text-count"></p>
                                </div>
                                <div class="signup fullname">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="upload" class="signup-input" multiple placeholder="Upload an image">
                                    <label for="">Current Image</label>
                                    <input type="hidden"  name="old_image" value="<?= $data['image']; ?>">
                                    <img src="../uploadsCategories/<?= $data['image']; ?>" alt="">
                                </div>
                                <div class="signup-role">
                                    <div class="signup admin-role">
                                        <label for="">Hide</label>
                                        <input type="checkbox" <?= $data['status'] == '0' ? '':'checked';?> name="status" class="signup-input">
                                    </div>
                                </div>
                            
                                <input type="hidden" name="added_by" value="<?= $_SESSION['auth_user']['fullname']; ?>">
                                
                                <button class="signup-submit" name="update_category_submit">Update Category</button>
                            </form>
                        </div>
                        
                        <?php
                            }
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