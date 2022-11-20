<?php
    
    include ("functions/userFunctions.php");
    require ("includes/header.php")

?>

        <main class="menu">

            <div class="main-container">
                <h1 class="title">DRNKs</h1>
            </div>

            <!-- ---------------------- -->
            <!--        Categories      -->
            <!-- ---------------------- -->
            <div class="category-links">

                        <div class="">
                            <a href="menu.php">All Products</a>
                        </div>
                <?php 
                    $fetch_data = getCategoriesProducts("categories");
                    if(mysqli_num_rows($fetch_data) > 0) {
                        foreach($fetch_data as $data) { ?>


                        <div class="">
                            <a href="products.php?category=<?= $data['name'] ?>"><?= $data['name']; ?></a>
                        </div>

                <?php
                        }
                    } else {
                        echo "No Category Available";
                    }
                ?>
            </div>

            <!-- ---------------------- -->
            <!--        Products        -->
            <!-- ---------------------- -->
            <div class="card-menu-container">
                <?php 
                    $fetch_data_products = getCategoriesProducts("products");
                    if(mysqli_num_rows($fetch_data_products) > 0) {
                        foreach($fetch_data_products as $data_products) { ?>
                        
                        <div class="card-menu">
                            <img src="uploadsProducts/<?= $data_products['image']; ?>" alt="">
                            <h2 class="card-menu-title"><?= $data_products['name'] ?></h2>
                            <p class="card-menu-description"><?= $data_products['category_id']; ?></p>
                        </div>
                    
                <?php
                        }
                    }
                ?>
                

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