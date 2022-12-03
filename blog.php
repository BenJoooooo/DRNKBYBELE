<?php
    include ("functions/userFunctions.php");
    require ("includes/header.php");

?>

    <main class="blogs-about">
        <div class="about-container">

                <?php 
                    $fetch_data_products = getJointData("products", "categories");
                    if(mysqli_num_rows($fetch_data_products) > 0) {
                        foreach($fetch_data_products as $data_products) { ?>
                        
                        <div class="blogs-container">
                            <div class="blog-card">
                                <div class="img-container">
                                    <img src="uploadsProducts/<?= $data_products['image'] ?>" alt="">
                                </div>
                                <div class="content-container">
                                    <span class="date">June 25, 2000</span>
                                    <a href="#" class="title"><?= $data_products['product_name'] ?> </a>
                                    <p class="description"><?= $data_products['description'] ?></p>
                                </div>
                            </div>
                        </div>        
                        
                <?php
                        }
                    }
                ?>
            <!-- <div class="blog-card">
                <div class="img-container">

                </div>
                <div class="content-container">
                    <h1 class="title"></h4>
                    <p class="description"></p>
                </div>
            </div> -->
        </div>
    </main>

<?php

    require ("includes/footer.php");

?>  