<?php
    
    include ("functions/userFunctions.php");
    require ("includes/header.php")
    

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
                            <a href="menu.php">All Products</a>
                        </div>
                <?php 
                    $fetch_data = getCategoriesProducts("categories");
                    if(mysqli_num_rows($fetch_data) > 0) {
                        foreach($fetch_data as $data) { ?>


                        <div class="">
                            <a href="products.php?category=<?= $data['name'] ?>"><?= $data['name']; ?></a>
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
                    $fetch_data_products = getJointData("products", "categories");
                    if(mysqli_num_rows($fetch_data_products) > 0) {
                        foreach($fetch_data_products as $data_products) { ?>
                        
                        <div class="card-menu">
                            <div class="img-container">
                                <img src="uploadsProducts/<?= $data_products['image']; ?>" alt="">
                            </div>
                            <div class="card-menu-content">
                                <h2 class="card-menu-title"><?= $data_products['product_name'] ?></h2>
                                <p class="card-menu-description"><?= $data_products['category_name']; ?></p>
                            </div>
                        </div>
                    
                <?php
                        }
                    }
                ?>
                
                
        </main>

<?php

    require ("includes/footer.php");

?>