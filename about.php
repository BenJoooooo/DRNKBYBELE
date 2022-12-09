<?php
    include ("functions/userFunctions.php");
    require ("includes/header.php");
?>

        <main class="menu-about">
          <div class="about-container">
            <?php 
                $fetch_data_products = getActiveData("blogsabout");
                if(mysqli_num_rows($fetch_data_products) > 0) {
                    foreach($fetch_data_products as $data_products) { ?>
                    

                    <div class="about-card">
                      <div class="img-container about-card-one">
                        <a href="blogs_info.php?blog=<?= $data_products['slug']; ?>"><img src="uploadsBlogs/<?= $data_products['image'] ?>" alt=""></a>
                      </div>
                      <div class="content-container about-card-two">
                        <h1 class="title"><?= $data_products['title'] ?> </h1>
                        <p class="description"><?= $data_products['description'] ?></p>
                        <a href="blogs_info.php?blog=<?= $data_products['slug']; ?>">Read More</a>
                      </div>
                    </div>
                    
            <?php
                    }
                }
            ?>
          </div>
          
          <?php if(isset($_SESSION['auth'])) : 
            
            if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') : ?>

              <div class="about-container">
                edits
              </div>

            <?php else : ?>
            <?php endif; ?>
          <?php else : ?>
          <?php endif; ?>
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