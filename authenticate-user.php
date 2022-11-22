<?php 

    if(!isset($_SESSION['auth'])) {
        redirect("login.php", "Sorry, You need to be logged in");
    }

?>