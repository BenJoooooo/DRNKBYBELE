<?php
    include ("functions/userFunctions.php");
    require ("includes/header.php");
?>
<!-- 
        <main class="menu-about">
            <div class="about-container">
                <div class="about-card card-one">    
                    <a href="" class="read-more">Read more</a>
                </div>
                <div class="about-card card-two">

                </div>
                <div class="about-card card-three">
    
                </div>
                <div class="about-card card-four">
                    <a href="" class="read-more">Read more</a>
                </div>

                <div class="about-card card-five">
                    <a href="" class="read-more">Read more</a>
                </div>
                <div class="about-card card-six">

                </div>
                <div class="about-card card-seven">
    
                </div>
                <div class="about-card card-eight">
                    <a href="" class="read-more">Read more</a>
                </div>
            </div>
        </main> -->

        <main class="menu-about">
          <div class="about-container">
            

                <?php 
                    $fetch_data_products = getJointData("products", "categories");
                    if(mysqli_num_rows($fetch_data_products) > 0) {
                        foreach($fetch_data_products as $data_products) { ?>
                        

                        <div class="about-card">
                          <div class="img-container about-card-one">
                            <img src="uploadsProducts/<?= $data_products['image'] ?>" alt="">
                          </div>
                          <div class="content-container about-card-two">
                            <h1 class="title"><?= $data_products['product_name'] ?> </h1>
                            <p class="description"><?= $data_products['description'] ?></p>
                          </div>
                        </div>
                        
                <?php
                        }
                    }
                ?>
            
          </div>
        </main>

<?php
    require ("includes/footer.php");
?>

    <!-- Messenger Chat Plugin Code -->
    <!-- <div id="fb-root"></div> -->

    <!-- Your Chat Plugin code -->
    <!-- <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100181522130367");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script> -->

    <!-- Your SDK code -->
    <!-- <script>
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
</html> -->