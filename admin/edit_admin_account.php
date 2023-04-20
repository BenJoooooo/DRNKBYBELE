<?php

    session_start();
    include ('../functions/accessMiddleWareAdmin.php');
    include ('includes/header.php');
    include ('includes/sidebar.php');

?>
    <div class="wrapper">
        <?php include ('includes/sidebar.php'); ?>

        <div class="body-wrapper">
            <div class="admin-main-content-add-page">

                <!-- Session Message -->
                <?php include('../functions/sessionmessage.php'); ?>
                
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

                        <?php if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $adminUsers = getById("users", $id);

                            if(mysqli_num_rows($adminUsers) > 0) {
                                $data = mysqli_fetch_array($adminUsers);
                            ?>

                            <div class="card-header">
                                <h3>Edit Admin Account</h3>
                                <a href="admin_admin" class="btn px-4 btn-light float-end">Back</a>
                            </div>

                            <div class="signup-card-body">
                                <form action="../functions/codes.php" method="POST" class="signup-form">
                                    <div class="signup fullname">
                                        <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
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
                                            <input type="password" name="repeat_signup_password" id="repeatPassword" required class="signup-input" placeholder="Repeat New Passsword">
                                            <i class="fa fa-eye" id="show-repeat-password"></i>
                                        </div>
                                    </div>
                                    <div class="signup-role">
                                        <div class="signup admin-role">
                                            <label for="">Manager</label>
                                            <input type="radio" name="signup_radio" value="manager"  class="signup-input" checked>
                                        </div>
                                        <div class="signup admin-role">
                                            <label for="">Admin</label>
                                            <input type="radio" name="signup_radio" value="admin" class="signup-input" checked>
                                        </div>
                                    </div>
                                    <button class="signup-submit" name="update_admin_submit">Update User</button>
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