<?php
    session_start();
    require ("includes/header.php");

?>

        <main class="main-contact">
            <!-- <div class="contact-container">
                <h1 class="contact-header">Send us a message</h1>
                <div class="contact-form-container"> -->
                    <!-- Fix the responsiveness of textarea<textarea class="contact-form" cols="50" rows="20" type="text" placeholder="Write your message here" spellcheck="false"></textarea> -->
                    <!-- <button class="contact-form-submit" type="submit">Submit</button>
                </div>
            </div> -->

            <div class="contact-container">
              <div class="contact-header">
                <h1>Send us a message</h1>
              </div>

              <div class="contact-form-container">
                <input type="text" name="fullname" placeholder="Full Name" class="contact-input info contact-form">
                <input type="email" name="email" placeholder="Email Address" class="contact-input email contact-form">
                <input type="text" name="phone_number" placeholder="Phone" class="contact-input phone contact-form">
                <textarea name="message" placeholder="Type Your Message" class="contact-input message contact-form"></textarea>
                <button type="submit" name="send_message" class="contact-input send">Send</button>
              </div>
            </div>

            <div class="mapouter">
                <div class="gmap_canvas">
                     <!-- Fix the responsiveness of textarea --><iframe width="800" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=16%201st%20camarilla&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://123movies-to.org"></a><br>
                    <style>.mapouter{position:relative;text-align:right;height:400;width:800px;}</style><a href="https://www.embedgooglemap.net">get google map link</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:800px;}</style>
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