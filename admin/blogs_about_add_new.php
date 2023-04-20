<?php

    session_start();
    
    // include ('../functions/middleware.php');
    include ('../functions/accessMiddleWare.php');
    include ('includes/header.php');

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
                        <h3>Internal Blogs Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                        <div class="card-header">
                            <h3>Create A Blog</h3>
                            <a href="blogs_about_page" class="btn btn-light float-end">Back</a>
                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">
                                <div class="signup-role">
                                    <div class="signup price">
                                        <label for="">Title</label>
                                        <input type="text" name="name" class="signup-input" required placeholder="Blog Title">
                                    </div>
                                    <div class="signup price">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" class="signup-input" required placeholder="e.g., blog-show-case">
                                    </div>
                                </div>
                                <div class="signup">
                                    <label for="">Story</label>
                                    <!-- <input type="text" name="description" class="signup-input" required placeholder="Write Article"> -->
                                    <textarea name="story" cols="30" rows="10" class="signup-input" placeholder="Write article" id="my-text" maxlength="800" required></textarea>
                                    <p id="count-result" class="text-count"></p>
                                </div>
                                <div class="signup">
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
                                
                                <button class="signup-submit" name="add_about_blog">Publish Blog</button>
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