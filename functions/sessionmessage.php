<div class="signup_message">
    <?php if (isset($_SESSION['message'])) { ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <bold>Hey! </bold><?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']); } elseif (isset($_SESSION['successmessage'])) { ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <bold>Great! </bold><?= $_SESSION['successmessage'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['successmessage']); } elseif (isset($_SESSION['failedmessage'])) { ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <bold>Oh no! </bold><?= $_SESSION['failedmessage'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['failedmessage']); }?>
</div>