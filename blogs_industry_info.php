<?php
    
    include ("functions/userFunctions.php");
    require ("includes/header.php");
    
    if(isset($_GET['blog'])) {

        $blog_slug = $_GET['blog'];
        $blog_data = getBlogSlugActive("blogsindustry", $blog_slug);
        $blog = mysqli_fetch_array($blog_data);

        if($blog) { 
            ?>

                 <main class="menu">

                    <div class="industry-container product_data">
                        <div class="industry-image-container">
                            <img src="uploadsBlogs/<?= $blog['image']; ?>" alt="">
                        </div>

                        <div class="industry-content-container">
                            <div class="industry-description">
                                <h3><?= $blog['title']; ?></h3>
                            </div>
                            <div class="industry-info-order">
                                <p><?= $blog['description']; ?></p>
                            </div>
                        </div>
                    </div>
                </main>

            <?php
        } else {
            ?>
                <div class="error-message-container">
                    <div class="product-not-available">
                        <h3 class="text-message">Product Not Found!</h3>
                    </div>
                </div>
            <?php
        }

    } else {
        ?>
            <div class="error-message-container">
                <div class="product-not-available">
                    <h3 class="text-message">Something Went Wrong!</h3>
                </div>
            </div>
        <?php
        }
    
        require ("includes/footer.php");
    
    ?>