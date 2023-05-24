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

            <div class="content-container">
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
                        <textarea name="article" class="input-article" required placeholder="Enter Your Message" maxlength="200" id="my-teext"></textarea>
                        <p id="counter-result" class="text-count"></p>
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
        var colors = ['#F8C8DC','#A7C7E7','#FAA0A0','#C1E1C1','#FFFAA0','#C3B1E1','#F08080','#FFC0CB','#FFA07A','#FFFFE0','#FFE4C4'];

        // var fonts = ['Fredoka One', 'League Spartan', 'Arial', 'Times New Roman', 'Lucida Sans', 'Cambria', 'Georgia', 'Verdana', 'Segoe UI', 'Courier New'];

        var fonts = ['League Spartan'];
        var containers = document.querySelectorAll(".content-container");

        for (i = 0; i < containers.length; i++) {
            containers[i].style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            containers[i].style.fontFamily = fonts[Math.floor(Math.random() * fonts.length)];
        }
    </script>

<?php 
    include ("includes/footer.php");
?>