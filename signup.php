<?php

    session_start();


    if(isset($_SESSION['auth'])) {
        require "functions/myfunctions.php";
        redirect("index.php", "You are already logged in");
        exit();

    }

    include "includes/header.php";
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
            <h1 class="sign-up-create-account">Create an account</h1>
            <p class="sign-up-already-have">Already have an account? <a href="login.php">Log in</a></p>
        </div>

        <div class="signup-form-container">
            <form action="functions/authcode.php" method="POST" class="signup-form">
                <div class="signup fullname">
                    <label for="">Full Name</label>
                    <input type="text" name="signup_fullname" class="signup-input name">
                </div>
                <div class="signup email">
                    <label for="">Email</label>
                    <input type="email" name="signup_email" class="signup-input email">
                </div>
                <div class="signup password">
                    <label for="">Password</label>
                    <input type="password" name="signup_password" class="signup-input password">
                </div>
                <div class="signup repeat-password">
                    <label for="">Repeat Password</label>
                    <input type="password" name="repeat_signup_password" class="signup-input repeat-password-password">
                </div>
                <button class="signup-submit" name="signup_submit">Submit</button>
            </form>
        </div>
    </div>

<?php

    include "includes/footer.php";

?>