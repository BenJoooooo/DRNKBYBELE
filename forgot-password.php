<?php
    include ("functions/userFunctions.php");

    if(isset($_SESSION['auth'])) {
        // include "functions/myfunctions.php";
        redirect("index.php", "You are already logged in");
        exit(0);
    }

    require ("includes/header.php");
?>
    <div class="signup-wrapper">
        <div class="signup-container">
        
            <!-- Session Message -->
            <?php include('functions/sessionmessage.php'); ?>
            
            <div class="signup-header">
                <h1 class="sign-up-create-account">Forgot Password</h1>
            </div>

            <div class="signup-form-container">
                <form action="functions/authcode.php" method="POST" class="signup-form">
                    <div class="signup email">
                        <input type="email" name="login_email" class="signup-input email" required placeholder="Enter your email">
                    </div>
                    
                    <button class="signup-submit" name="check_email_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="functions/passwordIcon.js"></script>

<?php
    require ("includes/footer.php");
?>