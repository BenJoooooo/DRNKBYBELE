<?php

    session_start();
    
    include ('../functions/middleware.php');
    include ('../functions/middleware_manager.php');
    include ('includes/header.php');

?>
    <div class="wrapper">
        <?php include('includes/sidebar.php'); ?>

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

                        <div class="card-header">
                            <h3>Create New Account</h3>
                            <a href="admin_admin.php" class="btn px-4 btn-light float-end">Back</a>
                        </div>

                        <div class="signup-card-body">
                            <form action="../functions/codes.php" method="POST" class="signup-form">
                                <div class="signup fullname">
                                    <label for="">Full Name</label>
                                    <input type="text" name="signup_fullname" class="signup-input" required placeholder="Enter Full Name">
                                </div>
                                <div class="signup email">
                                    <label for="">Email</label>
                                    <input type="email" name="signup_email" class="signup-input" required placeholder="Enter Email">
                                </div>
                                <div class="signup repeat-password">
                                    <label for="">Address</label>
                                    <input type="text" name="signup_address" class="signup-input" required placeholder="Enter House No. / Street, Brgy., City, Zip Code">
                                </div>
                                <div class="signup password">
                                    <label for="">Password</label>
                                    <div class="password-container">
                                        <input type="password" name="signup_password" id="password" class="signup-input" required placeholder="Password">
                                        <i class="fa fa-eye" id="show-password"></i>
                                    </div>
                                </div>
                                <div class="signup repeat-password">
                                    <label for="">Repeat Password</label>
                                    <div class="password-container">
                                        <input type="password" name="repeat_signup_password" id="repeatPassword" class="signup-input" required placeholder="Confirm Password">
                                        <i class="fa fa-eye" id="show-repeat-password"></i>
                                    </div>
                                </div>
                                <div class="signup-role">
                                    <div class="signup admin-role">
                                        <label for="">Manager</label>
                                        <input type="radio" name="signup_radio"  class="signup-input" value="manager" checked>
                                    </div>
                                    <div class="signup admin-role">
                                        <label for="">Admin</label>
                                        <input type="radio" name="signup_radio" class="signup-input" value="admin" checked>
                                    </div>
                                    <div class="signup admin-role">
                                        <label for="">Content Manager</label>
                                        <input type="radio" name="signup_radio" class="signup-input" value="content" checked>
                                    </div>
                                </div>
                                <button class="signup-submit" name="admin_signup_submit">Add User</button>
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