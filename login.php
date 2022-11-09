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
        <div class="signup_message">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <bold>Hey! </bold><?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION['message']); } ?>
        </div>
        
        <div class="signup-header">
            <h1 class="sign-up-create-account">Login</h1>
            <p class="sign-up-already-have">Don't have an account? <a href="signup.php">Register</a></p>
        </div>

        <div class="signup-form-container">
            <form action="functions/authcode.php" method="POST" class="signup-form">
                <div class="signup email">
                    <label for="">Email</label>
                    <input type="email" name="login_email" class="signup-input email">
                </div>
                <div class="signup password">
                    <label for="">Password</label>
                    <input type="password" name="login_password" class="signup-input password">
                </div>
                
                <button class="signup-submit" name="login_submit">Login</button>
            </form>
        </div>
    </div>

<?php

    require ("includes/footer.php");

?>