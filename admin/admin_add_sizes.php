<?php

    session_start();
    
    // include ('../functions/middleware.php');
    include ("../functions/accessMiddleWareManager.php");
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
                        <h3>Cup Sizes & Price Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                        <!-- Session Message -->
                        <?php include('../functions/sessionmessage.php'); ?>

                        <div class="card-header">
                            <h3>Add Sizes & Price</h3>
                            <a href="admin_sizes_page" class="btn px-4 btn-light float-end">Back</a>
                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form" enctype="multipart/form-data">
                                <div class="signup-role">
                                    <div class="signup size">
                                        <label for="">Size</label>
                                        <input type="text" name="name" class="signup-input" required placeholder="Enter Size">
                                    </div>
                                    <div class="signup price">
                                        <label for="">Size Price</label>
                                        <input type="number" name="size_price" class="signup-input" placeholder="Enter Size Price">
                                    </div>
                                </div>

                                <input type="hidden" name="added_by" value="<?= $_SESSION['auth_user']['fullname']; ?>">
                                
                                <button class="signup-submit" name="add_size_submit">Add Size & Price</button>
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