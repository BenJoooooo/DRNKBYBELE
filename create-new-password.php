<?php
    include ("functions/userFunctions.php");

    if(isset($_SESSION['auth'])) {
        // include "functions/myfunctions.php";
        redirect("index.php", "You are already logged in");
        exit(0);
    }

    if(isset($_SESSION['email'])) {
        
    } else {
        redirectFailed("forgot-password.php", "Something went wrong");
    }

    require ("includes/header.php");
?>
    <div class="signup-wrapper">
        <div class="signup-container">
        
            <!-- Session Message -->
            <?php include('functions/sessionmessage.php'); ?>
            
            <div class="signup-header">
                <h1 class="sign-up-create-account">Change Password</h1>
            </div>

            <div class="signup-form-container">
                <form action="functions/authcode.php" method="POST" class="signup-form">
                    <div class="signup email">
                        <input type="password" name="password" class="signup-input email" required placeholder="Enter new password">
                    </div>
                    <div class="signup email">
                        <input type="password" name="cpassword" class="signup-input email" required placeholder="Confirm new password">
                    </div>
                    
                    <button class="signup-submit" name="change_password_submit">Submit</button>
                    <!-- <?= $_SESSION['email']; ?> -->
                </form>
            </div>
        </div>
    </div>
    
    <script src="functions/passwordIcon.js"></script>

<?php
    require ("includes/footer.php");
?>