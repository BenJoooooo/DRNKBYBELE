<?php
    include ("functions/userFunctions.php");
    include ("authenticate-user.php");
    include ("includes/header.php");
?>

    <?php include ('functions/sessionmessage.php'); ?>

    <main class="menu-espresso">
        <div class="espresso-container">
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit sdfsdfsdfsdfsdfsdfsdfsdfamet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor ssdfsdfsdfsdfsfsdfsfsfdfsdfit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit sdfsdfsdfsdfsdfsdfsdfsdfamet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="img-container">
                    <img src="img/aws.jpg" alt="">
                </div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="img-container">
                    <img src="img/edit-2.jpg" alt="">
                </div>
                <div class="article">Lorem ipsum dolor ssdfsdfsdfsdfsfsdfsfsfdfsdfit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
            <div class="content-container area">
                <div class="date">12/12/2022</div>
                <div class="article">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam tempora quae dolorum doloremque illum similique error praesentium fugiat doloribus fuga.</div>
                <div class="name">- Ben Joshua</div>
            </div>
        </div>
    </main>

    <main class="menu-espresso-lower">
        <div class="industry-title">
            <h3>Freeboard! Write anything you want, the world is watching!</h3>
        </div>
        <div class="action-container">
            <form action="functions/handleEspress.php" method="POST" enctype="multipart/form-data" class="industry-form">
                <div class="form-wrapper">
                    <div class="header">
                        <div class="title">
                            <label for="">Title</label>
                            <input name="title" type="text" class="input-title" required placeholder="Enter Your Title">
                        </div>
                        <div class="name">
                            <label for="">Name</label>
                            <input name="name" type="text" class="input-name" required placeholder="Enter a Name">
                        </div>
                    </div>
                    <div class="img-container">
                        <label for="">Image</label>
                        <input name="image" type="file" id="myImage" class="input-image" required>
                    </div>
                    <div class="text-body">
                        <label for="">Your Message</label>
                        <textarea name="article" class="input-article" required placeholder="Enter Your Message"></textarea>
                    </div>
                </div>

                <button class="addPost">Post Now</button>
            </form>

        </div>
    </main>


    <!-- -------------------------------------------------------- -->
    <!-- Function for random background colors of EspressYourSelf -->
    <!-- -------------------------------------------------------- -->
    <script>
        var colors = ['#f5bfd2', '#a1cdce', '#e5db9c', '#beb4c5', '#e6a57e'];
        var fonts = ['Fredoka One', 'League Spartan', 'Arial', 'Times New Roman', 'Lucida Sans', 'Cambria', 'Georgia', 'Verdana', 'Segoe UI', 'Courier New'];
        var containers = document.querySelectorAll(".content-container");

        for (i = 0; i < containers.length; i++) {
            containers[i].style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            containers[i].style.fontFamily = fonts[Math.floor(Math.random() * fonts.length)];
        }
    </script>

<?php 
    include ("includes/footer.php");
?>