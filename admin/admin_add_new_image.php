<?php

    session_start();
    
    include ('../functions/middleware.php');
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
                        <h3>Home Page Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                        <div class="card-header">
                            <h3>Add Cover Photo
                                <a href="admin_manage_home.php" class="btn btn-light float-end">Back</a>
                            </h3>
                            
                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">
                                <div class="signup fullname">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="signup-input" required placeholder="Enter Full Name">
                                    </div>    
                                <div class="signup email">
                                    <label for="">Description</label>
                                    <input type="text" name="description" class="signup-input" placeholder="Enter description">
                                </div>
                                <div class="signup fullname">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="upload" class="signup-input" required multiple placeholder="Upload an image">
                                </div>

                                <div class="signup-role">
                                    <div class="signup admin-role">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" class="signup-input">
                                    </div>
                                </div>

                                <input type="hidden" name="added_by" value="<?= $_SESSION['auth_user']['fullname']; ?>">
                                
                                <button class="signup-submit" name="upload_photo">Add Photo</button>
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