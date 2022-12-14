<?php
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");
    include ("includes/header.php");
?>

    <?php include ('functions/sessionmessage.php'); ?>

    <main class="menu-espresso">
        <div class="espresso-container">

            <?php 
                $espressyourself = getAll("espressyourself");
                if(mysqli_num_rows($espressyourself) > 0) {
                    foreach ($espressyourself as $espressdata) {
             ?>

            <div class="content-container area">
                <div class="date"><?= $espressdata['created_at'] ?></div>
                <div class="title"><?= $espressdata['title'] ?></div>
                <div class="img-container">
                    <img src="uploadsEspresso/<?= $espressdata['image'] ?>" alt="">
                </div>
                <div class="article"><?= $espressdata['article'] ?></div>
                <div class="name">- <?= $espressdata['name']; ?></div>
            </div>

            <?php 
                }
            }
            ?>
        
        </div>
    </main>

    <main class="menu-espresso-lower">
        <div class="industry-title">
            <h3>Freeboard! Write anything you want, the world is watching!</h3>
        </div>
        <div class="action-container">
            <form action="functions/handleEspress.php" method="POST" enctype="multipart/form-data" class="industry-form">
                <div class="form-wrapper">
                    <div class="header">
                        <div class="title">
                            <label for="">Title</label>
                            <input name="title" type="text" class="input-title" required placeholder="Enter Your Title">
                        </div>
                        <div class="name">
                            <label for="">Name</label>
                            <input name="name" type="text" class="input-name" required placeholder="Enter a Name">
                        </div>
                    </div>
                    <div class="img-container">
                        <label for="">Image</label>
                        <input name="image" type="file" id="myImage" class="input-image" required>
                    </div>
                    <div class="text-body">
                        <label for="">Your Message</label>
                        <textarea name="article" class="input-article" required placeholder="Enter Your Message"></textarea>
                    </div>
                </div>

                <button name="addPost" class="addPost">Post Now</button>
            </form>

        </div>
    </main>


    <!-- -------------------------------------------------------- -->
    <!-- Function for random background colors of EspressYourSelf -->
    <!-- -------------------------------------------------------- -->
    <script>
        var colors = ['#f5bfd2', '#a1cdce', '#e5db9c', '#beb4c5', '#e6a57e', '#f7f6cf', '#b6d8f2', '#f4cfdf', '#5784ba', '#9ac8eb', '#ccd4bf', '#e7cba9', '#eebab2', '#f5f3e7', '#f5bfd2', '#a1cdce', '#e5db9c', '#beb4c5', '#e5a57e', '#218b82', '#9ad9db', '#e5dbd9', '#98d4bb', '#eb96aa', '#c6c9d0', '#c54b6c', '#e5b3bb', '#c47482', '#d5e4c3', '#f9968b', '#f27348', '#26474e', '#76cdcd', '#2cced2', '#b8e0f6', '#a4cce3', '#37667e', '#dec4d6', '#7b92aa'];

        var fonts = ['Fredoka One', 'League Spartan', 'Arial', 'Times New Roman', 'Lucida Sans', 'Cambria', 'Georgia', 'Verdana', 'Segoe UI', 'Courier New'];
        var containers = document.querySelectorAll(".content-container");

        for (i = 0; i < containers.length; i++) {
            containers[i].style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            containers[i].style.fontFamily = fonts[Math.floor(Math.random() * fonts.length)];
        }
    </script>

<?php 
    include ("includes/footer.php");
?>