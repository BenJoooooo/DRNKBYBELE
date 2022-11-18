<?php 

    $error = $_SERVER["REDIRECT_STATUS"];
    $error_title = '';
    $error_message = '';

    if($error == 404) {
        $error_title = '404 page not found';
        $error_message = 'The document / file requested was not found on this server.';
    } 

    include ("../includes/header.php");
?>

<div class="container">
  <h1><?php echo $error_title; ?></h1>
  <h1><?php echo $error_message; ?></h1>
</div>

<?php

    include ("../includes/footer.php");

?>