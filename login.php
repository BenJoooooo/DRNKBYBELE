<?php

    session_start();

    if(isset($_SESSION['auth'])) {
        include "functions/myfunctions.php";
        redirect("index.php", "You are already logged in");
        exit();
    }

    require ("includes/header.php");

?>

    <div class="signup-container">
       
        <!-- Session Message -->
        <?php include('functions/sessionmessage.php'); ?>
        
        <div class="signup-header">
            <h1 class="sign-up-create-account">Login</h1>
            <p class="sign-up-already-have">Don't have an account? <a href="signup.php">Register</a></p>
        </div>

        <div class="signup-form-container">
            <form action="functions/authcode.php" method="POST" class="signup-form">
                <div class="signup email">
                    <label for="">Email</label>
                    <input type="email" name="login_email" class="signup-input email" required placeholder="Enter your email">
                </div>
                <div class="signup password">
                    <label for="">Password</label>
                    <div class="password-container">
                        <input type="password" name="login_password" id="password" class="signup-input password" required placeholder="Enter your password">
                        <i class="fa fa-eye" id="show-password"></i>
                    </div>
                </div>
                
                <button class="signup-submit" name="login_submit">Login</button>
            </form>
        </div>
    </div>
    
    <script src="functions/passwordIcon.js"></script>

<?php

    require ("includes/footer.php");

?>