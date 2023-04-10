<?php
    include ("functions/userFunctions.php");
    require ("includes/header.php");

?>

    <main class="blogs-about">
        <!-- <div class="input-container">
            <input type="text" id="search-blog" class="search-function" placeholder="Search">
        </div> -->

        <div class="about-container">
                <?php 
                    $fetch_data_products = getActiveData("blogsindustry");
                    if(mysqli_num_rows($fetch_data_products) > 0) {
                        foreach($fetch_data_products as $data_products) { ?>
                        
                        <div class="blogs-container">
                            <div class="blog-card">
                                <div class="img-container">
                                    <a href="blogs_industry_info?blog=<?= $data_products['slug'] ?>"><img src="uploadsBlogs/<?= $data_products['image'] ?>" alt=""></a>
                                </div>
                                <div class="content-container">
                                    <p class="date"><?= $data_products['created_at'] ?></p>
                                    <a href="#" class="title"><?= $data_products['title'] ?> </a>
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