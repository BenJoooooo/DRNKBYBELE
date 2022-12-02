<?php 
    $error = $_SERVER["REDIRECT_STATUS"];
    $error_title = '';
    $error_message = '';

    if($error == 404) {
        $error_title = 'I have bad news for you';
        $error_message = 'The document or file user requested was not found on this server.';
    } 

    require ("../includes/header_404.php");
?>
    <body>
        <div id="container">
            <header>
                <nav class="container container-header">
                    <div class="not-found">
                        <h4>404 not found</h4>
                    </div>
                </nav>
            </header>

            <main class=" container-main">
                <div class="main-container container">
                    <div class="main-picture">
                        <img src="img/logo.png" alt="">
                    </div>
                    <div class="main-content">
                        <h3><?= $error_title ?></h3>
                        <h4><?= $error_message ?></h4>
                    </div>
                </div>
            </main>

            <footer>
                <div class="container container-footer">
                    <div class="footer-credits">
                        <h4>All rights reserved - Capstone Project</h4>
                    </div>
                </div>
            </footer>
        </div>
    
    </body>
</html>

<?php
    include("../includes/footer_404.php");
?>