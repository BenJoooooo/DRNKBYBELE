<?php
    include ("functions/userFunctions.php");
    require ("includes/header.php");

?>
            <!-- Session Message -->
            <?php include('functions/sessionmessage.php'); ?>

        <main class="main-contact">

            <div class="contact-container">
              <div class="contact-header">
                <h1>Send us a message</h1>
              </div>

              <form class="contact-form-container" action="functions/contact-form-request.php" method="POST">
                <input type="text" name="fullname" placeholder="Full Name" class="contact-input info contact-form">
                <input type="email" name="email" placeholder="Email Address" class="contact-input email contact-form">
                <input type="number" name="phone_number" placeholder="Phone" class="contact-input phone contact-form">
                <textarea name="message" placeholder="Type Your Message" class="contact-input message contact-form"></textarea>
                <button type="submit" name="send_message" class="contact-input send">Send</button>
              </form>
            </div>

            <div class="mapouter">
                <div class="gmap_canvas">
                     <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=16%201st%20camarilla&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://123movies-to.org"></a><br>
                    <style>.mapouter{position:relative;text-align:center;height:100%;width:100%}</style><a href="https://www.embedgooglemap.net">get google map link</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}</style>
                </div>
            </div>
        </main>

<?php

  require ("includes/footer.php");

?>