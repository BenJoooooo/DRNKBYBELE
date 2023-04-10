<?php 

    if(!isset($_SESSION['auth'])) {
        redirect("login", "Sorry, You need to be logged in");
    }

?>