<?php 

    $error = $_SERVER["REDIRECT_STATUS"];
    $error_title = '';
    $error_message = '';

    if($error == 404) {
        $error_title = 'I have bad news for you';
        $error_message = 'The document or file user requested was not found on this server.';
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/404.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>DRNK</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=League+Spartan:wght@100;200;400;500&display=swap');

:root {
    --ff-fredoka: 'Fredoka One', cursive;
    --ff-league: 'League Spartan', sans-serif;

    --fs-72: 4.5rem;
    --fs-48: 3rem;
    --fs-40: 2.5rem;
    --fs-32: 2rem;
    --fs-24: 1.5rem;
    --fs-16: 1rem;

    --clr-main-color: #C27933;
    --clr-secondary-color: white;
    --clr-dirty-white: #f6f6f6;
    --clr-background: #6B5237;
    --clr-dark-black: #1e1e1e;
    --clr-dark-grey: #3c3c3c;
}

* {
    box-sizing: border-box;
    font: inherit;
    color: inherit;
}

body {
    margin: 0;
    padding: 0;
}

header {
    background-color: var(--clr-dirty-white);
}

.container {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
}

.container-header {
    height: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.not-found h4 {
    padding-block: .5em;
    margin: 0;
    font-size: clamp(1rem, 2vw + .5rem, 2rem);
    font-family: var(--ff-league);
    color: var(--clr-main-color);
    font-weight: 500;
}

.main-container {
    min-height: 70vh;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10vw;
}

.footer-credits h4 {
    padding-block: .5em;
    margin: 0;
    font-size: clamp(.5rem, 1.5vw + .5rem, 1.2rem);
    font-family: var(--ff-league);
    color: var(--clr-main-color);
    opacity: .5;
}

main {
    background-color: #1e1e1e;
}

.container-footer {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.main-container img {
    height: 50vh;
    height: 100%;
    width: auto;
    width: 100%;
}

.main-content {
    display: flex;
    flex-direction: column;
    gap: 2.5em;
    max-width: 25vw;
    width: 100%;
}

.main-content h3 {
    max-width: 25vw;
    font-size: clamp(1rem, 3vw + 1rem, 3rem);
    color: var(--clr-dirty-white);
    font-family: var(--ff-league);
}

.main-content h4 {
    max-width: 25vw;
    font-size: clamp(.5rem, 2vw + .5rem, 2rem);
    text-align: justify;
    color: var(--clr-dirty-white);
    font-family: var(--ff-league);
}

footer {
    background-color: var(--clr-dirty-white);
}
    </style>
</head>
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