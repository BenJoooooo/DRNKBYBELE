        <footer>
            <div class="footer-content">
                <div class="footer column-two">
                    <h1 class="column-two-footer">About Us</h1>

                    <div class="footer-links-container">
                        <a href="about">DRNK BY BELE</a>
                        <a href="about">Our History</a>
                        <a href="espressyourself">Tesimonials</a>
                        <a href="blog">Blog</a>
                    </div>
                </div>

                <div class="footer column-two">
                    <h1 class="column-two-footer">Our Services</h1>

                    <div class="footer-links-container">
                        <a href="about">Events</a>
                        <a href="blog">Mission and Vision</a>
                        <a href="blog">Our Goals</a>
                        <a href="contact">Customer Service</a>
                    </div>
                </div>

                <div class="footer column-two">
                    <h1 class="column-two-footer">Follow us:</h1>

                    <div class="footer-links-socials">
                        <a href="https://www.facebook.com/drnkbybele"><i class="fab fa-facebook"></i>Facebook</a>
                        <a href="https://www.tiktok.com/@drnkbybeleph"><i class="fab fa-tiktok"></i>Tiktok</a>
                        <a href="https://www.instagram.com/drnkbybeleph"><i class="fab fa-instagram"></i>Instagram</a>
                        <a href="https://www.twitter.com/drnkbybele"><i class="fab fa-twitter"></i>Twitter</a>
                    </div>
                </div>

                <!-- <div class="footer column-one">
                    <img src="img/drnklogowhite.png" alt="">
                    <div class="footer-newsletter-container">
                        <p class="footer-p">Subscribe to our newsletter</p>
                        <form class="footer-newsletter">
                            <input class="newsletter-input" type="email" placeholder="Email Address" spellcheck="false">
                            <button class="submit-letter" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="footer-lower">
                <div class="copyright-container">
                    <h3>&#169 2022 Webify Creatives (Capstone Project). All rights reserved.</h3>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/mobilenav.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/addtocart.js"></script>
    <script src="js/orders.js"></script>

    <!-- Search function for blog -->
    <script type="text/javascript">

        // For web view
        $("#live_search").on('input', function() {
            const val = $(this).val().toUpperCase()

            // Blog search
            $('.blog-card').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })

            // About search
            $('.about-card').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })

            // Menu search
            $('.product-view').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })

            // Espressyourself search
            $('.content-container').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })
        })

        // For mobile view
        $("#live_search_mobile").on('input', function() {
            const val = $(this).val().toUpperCase()

            // Blog search
            $('.blog-card').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })

            // About search
            $('.about-card').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })

            // Menu search
            $('.product-view').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })

             // Espressyourself search
             $('.content-container').each(function() {
                if($(this).html().toUpperCase().indexOf(val) !== -1) {
                    $(this).show()
                } else {
                    $(this).hide()
                }
            })
        })


        // window.setTimeout( function() {
        // window.location.reload();
        // }, 30000);
    </script>

    

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
          version          : 'v16.0'
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