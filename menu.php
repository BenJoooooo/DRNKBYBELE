<?php
    session_start();

    include ("core/dbcon.php");

    // Fethes all data from the table
    function getCategories($table) {

        global $con;
        $query = "SELECT * FROM $table WHERE status = '0'"; // Status 0 is equals to visible, while status 1 is equals to hidden //
        return $query_run = mysqli_query($con, $query);

    }

    require ("includes/header.php")

?>

        <main class="menu">

            <div class="main-container">
                <h1 class="title">DRNKs</h1>
            </div>

            <div class="category-links">

            <?php 
                $fetch_data = getCategories("categories");
                if(mysqli_num_rows($fetch_data) > 0) {
                    foreach($fetch_data as $data) { ?>

                <div class="">
                    <a href=""><?= $data['name']; ?></a>
                </div>

            <?php
                    }
                }
            ?>
                <!-- <div class="allproducts-category">
                    <a href="">All Products</a>
                </div>
                <div class="milktea-category">
                    <a href="">Milk Tea</a>
                </div>
                <div class="cheesecake-category">
                    <a href="">Cheesecake</a>
                </div>
                <div class="freshmilk-category">
                    <a href="">Fresh Milk</a>
                </div>
                <div class="icedcoffee-category">
                    <a href="">Iced Coffee</a>
                </div>
                <div class="hotcoffee-category">
                    <a href="">Hot Coffee</a>
                </div> -->
            </div>

            <div class="card-menu-container">
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
                <div class="card-menu">
                    <img src="img/sample.jpg" alt="">
                    <h2 class="card-menu-title">Wintermelon</h2>
                    <p class="card-menu-description">Milk Tea Series</p>
                </div>
            </div>

        </main>

        <?php

            require ("includes/footer.php");

        ?>

    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100181522130367");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>