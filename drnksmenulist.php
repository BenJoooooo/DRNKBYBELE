<?php
    
    include ("functions/userFunctions.php");
    require ("includes/header.php");
    
    if(isset($_GET['category'])) {

    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);

    if($category)  {
    $cid = $category['id']; 
?>

        <main class="menu">

            <div class="main-container">
                <h1 class="title">DRNKs</h1>
            </div>

            <!-- ---------------------- -->
            <!--        Categories      -->
            <!-- ---------------------- -->
            <div class="category-links">

                        <div class="">
                            <a href="menu">All Products</a>
                        </div>
                        
                <?php 
                    $fetch_data = getCategoriesProducts("categories");
                    if(mysqli_num_rows($fetch_data) > 0) {
                        foreach($fetch_data as $data) { ?>


                        <div class="">
                            <a href="drnksmenulist?category=<?= $data['slug'] ?>"><?= $data['name']; ?></a>
                        </div>

                <?php
                        }
                    } else {
                        echo "No Category Available";
                    }
                ?>
            </div>

            <!-- ---------------------- -->
            <!--        Products        -->
            <!-- ---------------------- -->
            <div class="card-menu-container">

                <?php 
                    $productsbycat = getProductsbyCategory($cid);
                    if(mysqli_num_rows($productsbycat) > 0) {
                        foreach($productsbycat as $items) { ?>
                        
                        <a href="drnksproductinfo?product=<?= $items['slug']; ?>" class="product-view">
                            <div class="card-menu">
                                <div class="img-container">
                                    <img src="uploadsProducts/<?= $items['image']; ?>" alt="">
                                </div>
                                <div class="card-menu-content">
                                    <h2 class="card-menu-title"><?= $items['product_name'] ?></h2>
                                    <p class="card-menu-description"><?= $items['category_name']; ?> / <?= $items['size']; ?></p>
                                </div>
                            </div>
                        </a>
                    
                <?php
                        }
                    } else {
                ?>

                    <div class="error-message-container">
                    </div>
                    <div class="error-message-container">
                        <div class="product-not-available">
                            <h3 class="text-message">Sorry, Category is empty!</h3>
                        </div>
                    </div>
                    <div class="error-message-container">
                    </div>
                    
                <?php
                    }
                ?>
                

                
                
        </main>

<?php
        // Error for unknown slug in the url
        } else {

    ?>
        <div class="error-message-container">
            <div class="product-not-available">
                <h3 class="text-message">URL is broken!</h3>
            </div>
        </div>
    <?php

        }

    // Error for no slug in the url
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
