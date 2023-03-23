        <footer>
            <div class="footer-content">
                <div class="footer column-two">
                    <h1 class="column-two-footer">About Us</h1>

                    <div class="footer-links-container">
                        <a href="">DRNK BY BELE</a>
                        <a href="">Our History</a>
                        <a href="">Tesimonials</a>
                        <a href="">Blog</a>
                    </div>
                </div>

                <div class="footer column-two">
                    <h1 class="column-two-footer">Our Services</h1>

                    <div class="footer-links-container">
                        <a href="">Events</a>
                        <a href="">Mission and Vision</a>
                        <a href="">Our Goals</a>
                        <a href="">Customer Service</a>
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

                <div class="footer column-one">
                    <img src="img/drnklogowhite.png" alt="">
                    <div class="footer-newsletter-container">
                        <p class="footer-p">Subscribe to our newsletter</p>
                        <form class="footer-newsletter">
                            <input class="newsletter-input" type="email" placeholder="Email Address" spellcheck="false">
                            <button class="submit-letter" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-lower">
                <div class="copyright-container">
                    <h3>&#169 2022 Webify Creatives. All rights reserved.</h3>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/mobilenav.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/addtocart.js"></script>
    <script src="js/espressyourself.js"></script>


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
    </script>

    </body>
</html>