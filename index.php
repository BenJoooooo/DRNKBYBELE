<?php
    
    include ("functions/userFunctions.php");
    require ("includes/header.php");
    
?>

        <main>

        <!-- ----------------------------------------- -->
        <!-- Image Carousel for background cover photo -->
        <!-- ----------------------------------------- -->
            <section>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php 
                        $feth_data = getImage("images"); 
                        if(mysqli_num_rows($feth_data) > 0) {
                            foreach ($feth_data as $data) { ?>
                                <div class="carousel-item active">
                                    <img src="uploads/<?= $data['image']; ?>" class="d-block w-100" alt="...">
                                </div>
                        <?php
                            }
                        } ?>
                        
                    </div>
                </div>
            </section>

            <!-- ------------------------------------ -->
            <!-- Image carousel for featured products -->
            <!-- ------------------------------------ -->
            <section class="section-wrapper product_data">


                <h1 class="featured-products">Featured Products</h1>

                <div class="slide-container swiper">
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">

                            <?php 
                            $feth_featured = getFeaturedProducts("products", "categories"); 
                            if(mysqli_num_rows($feth_featured) > 0) {
                                foreach ($feth_featured as $product) { ?>
                                    <div class="card-container swiper-slide">
                                        <div class="card-overlay"></div>

                                        <a href="drnksproductinfo.php?product=<?= $product['slug']; ?>">
                                        <div class="card-image">
                                            <img src="uploadsProducts/<?= $product['image'] ?>" alt="" class="card-img">
                                            <span class="card-price"></span>
                                        </div>
                                        </a>

                                        <div class="card-content">
                                            <div class="card-texts">
                                                <h4 class="card-flavor"><?= $product['product_name']; ?></h4>
                                                <h5 class="card-category"><?= $product['category_name']; ?></h5>
                                            </div>

                                            <div class="card-rate-orders">
                                                <div class="card-rates">
                                                    <span><i class="fas fa-star-half-alt"></i></span>
                                                    <small class="rate">4.8</small>
                                                </div>
                                                <div class="drink-sizes">
                                                    <span class="small"><i class='fas fa-glass-whiskey'></i></i></span>
                                                    <span class="medium"><i class='fas fa-glass-whiskey'></i></i></span>
                                                    <span class="large"><i class='fas fa-glass-whiskey'></i></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="" class="input-qty" value="1">
                                        <button class="btn btn-primary addToCartBtn" value="<?= $product['id']; ?>">Add to cart</button>

                                    </div>
                            <?php
                                }
                             ?>

                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                
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

                ?>

            </section>
        </main>
    
    
        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/script.js"></script>

<?php 
    require ("includes/footer.php");
?>
