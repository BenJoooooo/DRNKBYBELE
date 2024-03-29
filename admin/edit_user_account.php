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
                        <h3>Admin Accounts Management</h3>
                    </div>
                </div>
                
                <div class="admin-page-table">
                    <div class="table-container">

                            <!-- Session Message -->
                            <?php include('../functions/sessionmessage.php'); ?>

                            <?php if(isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $adminUsers = getById("users", $id);

                                if(mysqli_num_rows($adminUsers) > 0) {
                                    $data = mysqli_fetch_array($adminUsers);
                            ?>

                            <div class="card-header">
                                <h3>Edit User Account</h3>
                                <a href="admin_users" class="btn px-4 btn-light float-end">Back</a>
                            </div>

                            <div class="signup-card-body">
                                <form action="../functions/codes.php" method="POST" class="signup-form">
                                    <div class="signup fullname">
                                        <input type="hidden" name="category_id_user" value="<?= $data['id']; ?>">
                                        <label for="">Full Name</label>
                                        <input type="text" name="signup_fullname" value="<?= $data['fullname']; ?>" required class="signup-input">
                                    </div>
                                    <div class="signup email">
                                        <label for="">Email</label>
                                        <input type="email" name="signup_email" value="<?= $data['email']; ?>" required class="signup-input">
                                    </div>
                                    <div class="signup repeat-password">
                                        <label for="">Address</label>
                                        <input type="text" name="signup_address" value="<?= $data['address']; ?>" required class="signup-input">
                                    </div>
                                    <div class="signup password">
                                        <label for="">Password</label>
                                        <div class="password-container">
                                            <input type="password" name="signup_password" id="password" required class="signup-input" placeholder="New Password">
                                            <i class="fa fa-eye" id="show-password"></i>
                                        </div>
                                    </div>
                                    <div class="signup repeat-password">
                                        <label for="">Repeat Password</label>
                                        <div class="password-container">
                                            <input type="password" name="repeat_signup_password" id="repeatPassword" required class="signup-input" placeholder="Repeat New Password">
                                            <i class="fa fa-eye" id="show-repeat-password"></i>
                                        </div>
                                    </div>
                                    <button class="signup-submit" name="update_user_submit">Update User</button>
                                </form>
                            </div>
                        <?php
                        } else {
                            echo "No data found";
                        }
                        } else {
                            
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