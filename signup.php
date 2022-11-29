<?php

    include ("functions/userFunctions.php");

    if(isset($_SESSION['auth'])) {
        require "functions/myfunctions.php";
        redirect("index.php", "You are already logged in");
        exit();

    }

    include "includes/header.php";
?>
    <div class="signup-wrapper">
        <div class="signup-container">

            <!-- Session Message -->
            <?php include('functions/sessionmessage.php'); ?>

            <div class="signup-header">
                <h1 class="sign-up-create-account">Create an account</h1>
                <p class="sign-up-already-have">Already have an account? <a href="login.php">Log in</a></p>
            </div>

            <div class="signup-form-container">
                <form action="functions/authcode.php" method="POST" class="signup-form">
                    <div class="signup fullname">
                        <label for="">Full Name</label>
                        <input type="text" name="signup_fullname" class="signup-input name" required placeholder="Enter Full Name">
                    </div>
                    <div class="signup email">
                        <label for="">Email</label>
                        <input type="email" name="signup_email" class="signup-input email" required placeholder="Enter Email">
                    </div>
                    <div class="signup password">
                        <label for="">Password</label>
                        <div class="password-container">
                            <input type="password" name="signup_password" id="password" class="signup-input password" required placeholder="Password">
                            <i class="fa fa-eye" id="show-password"></i>
                        </div>
                    </div>
                    <div class="signup repeat-password">
                        <label for="">Repeat Password</label>
                        <div class="password-container">
                            <input type="password" name="repeat_signup_password" id="repeatPassword" class="signup-input repeat-password" required placeholder="Confirm Password">
                            <i class="fa fa-eye" id="show-repeat-password"></i>
                        </div>
                    </div>
                    
                    <button class="signup-submit" name="signup_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="functions/passwordIcon.js"></script>
    <script src="functions/repeat-password.js"></script>

<?php

    include "includes/footer.php";

?>