<?php

    session_start();
    
    // include ('../functions/middleware.php');
    include ("../functions/accessMiddleWareRider.php");
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

                        <div class="card-header">
                            <h3>Create New Category</h3>
                            <a href="admin_categories_page" class="btn px-4 btn-light float-end">Back</a>
                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">
                                <div class="signup-role">
                                    <div class="signup price">
                                        <label for="">Category Name</label>
                                        <input type="text" name="name" class="signup-input" required placeholder="Enter Category Name">
                                    </div>
                                    <!-- <div class="signup price">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" class="signup-input" required placeholder="e.g., wintermelon-milktea">
                                    </div> -->
                                </div>
                                <div class="signup fullname">
                                    <label for="">Description</label>
                                    <!-- <input type="text" name="description" class="signup-input" required placeholder="Enter Description"> -->
                                    <textarea name="description" cols="30" rows="10" class="signup-input" placeholder="Write description" id="my-text" maxlength="800" required></textarea>
                                    <p id="count-result" class="text-count"></p>
                                </div>
                                <div class="signup fullname">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="upload" class="signup-input" required multiple placeholder="Upload an image">
                                </div>
                                <div class="signup-role">
                                    <div class="signup admin-role">
                                        <label for="">Hide</label>
                                        <input type="checkbox" name="status" class="signup-input">
                                    </div>
                                </div>
                                
                                <input type="hidden" name="added_by" value="<?= $_SESSION['auth_user']['fullname']; ?>">
                                
                                <button class="signup-submit" name="category_submit">Add Category</button>
                            </form>
                        </div>
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